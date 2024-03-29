<?php


class Client extends CI_Controller{
    
    private $path           = NULL;
    
    public function __construct() {
        parent::__construct();
        $this->path = FCPATH;
    }
    
    public function index(){
        //CLIENTE SIN INDEX ...
    }
    
    public function Add(){
        
        $nombre                 = isset($_REQUEST['txt_nombre']) ? $_REQUEST['txt_nombre'] : NULL;
        $tipo                   = isset($_REQUEST['txt_tipo']) ? $_REQUEST['txt_tipo'] : NULL;
        $iva                    = isset($_REQUEST['txt_iva']) ? $_REQUEST['txt_iva'] : NULL;
        $nit                    = isset($_REQUEST['txt_nit']) ? $_REQUEST['txt_nit'] : NULL;
        $contacto               = isset($_REQUEST['txt_contacto']) ? $_REQUEST['txt_contacto'] : NULL;
        $telefono               = isset($_REQUEST['txt_telefono']) ? $_REQUEST['txt_telefono'] : NULL;
        $celular                = isset($_REQUEST['txt_celular']) ? $_REQUEST['txt_celular'] : NULL;
        $fax                    = isset($_REQUEST['txt_fax']) ? $_REQUEST['txt_fax'] : NULL;
        $correo                 = isset($_REQUEST['txt_correo']) ? $_REQUEST['txt_correo'] : NULL;
        $local                  = isset($_REQUEST['txt_local']) ? $_REQUEST['txt_local'] : NULL;
        $direccion1             = isset($_REQUEST['txt_direccion']) ? $_REQUEST['txt_direccion'] : NULL;
        $direccion2             = isset($_REQUEST['txt_direccion2']) ? $_REQUEST['txt_direccion2'] : NULL;
        $pais                   = isset($_REQUEST['txt_pais']) ? $_REQUEST['txt_pais'] : NULL;
        $depto                  = isset($_REQUEST['txt_depto']) ? $_REQUEST['txt_depto'] : NULL;
        $ciudad                 = isset($_REQUEST['txt_ciudad']) ? $_REQUEST['txt_ciudad'] : NULL;
        $desc                   = isset($_REQUEST['txt_desc']) ? $_REQUEST['txt_desc'] : NULL;
        
        $files                  = isset($_FILES['file']) ? $_FILES['file'] : array();
        
        
        //VARIABLES DE RETORNO 
        $id_adjunto         = NULL;


        //CARGAMOS TODOS LOS HELPERS NECESARIOS 
        $this->load->helper(array('string', 'url', 'file', 'form'));
        
    
        if(!is_null(isset($files['name'][0]) ? $files['name'][0] : NULL) || count($files) >= 1){
            
            //CARGAMOS LAS LIBRERIAS 
            $this->load->library("base_upload");
            
            //CREARMOS UN NUEVO DIRECTORIO PARA LA DATA DEL CLIENTE
            $dir                = random_string("numeric");                
            $directory          = "files/unitee/clientes/" . $dir . "/";
            
            
            //BEGIN BUG , si se elimina el directorio raiz clientes , colapsa el sistema
            //REPAIR: verificar si existe el directorio
            
            if(!file_exists(FCPATH . "files/unitee/clientes/")){
                mkdir($this->path ."files/unitee/clientes/" , 0777);
            }
            //END BUG 
            
            //CREACION DE UN DIRECTORIO
            if(!file_exists( $this->path . $directory)){
                mkdir($this->path . $directory, 0777);
            }
            
            
            $file_names     = []; //arreglo nombres que se sustituiran en los archivos
            $attach         = []; //todos los adjuntos para la base de datos 
            
           
            //SUBIMOS LOS ARCHIVOS AL SISTEMA 
            for($i= 0; $i < count($files['name']) ; $i++){
                $al           = random_string();
                $file_names[] = $al;
                $attach[]     = json_encode(array(
                    "file"          => $al ,
                    "name"          => $files['name'][$i],
                    "directory"     => $dir
                ));
            }
            
            
            
            //SUBIR ARCHIVOS 
            $this->base_upload->set_path("./" . $directory);
            $this->base_upload->set_filename($file_names);
            $this->base_upload->Do_MultiUpload('file');
            
            $this->load->model("tshop/adjuntos" , "adj");
            
            $id_adjunto     =  $this->adj->Add(
                    json_encode($attach) , 
                    "cliente" ,
                    "Cod:" . random_string('alnum'));
          
        }
        
        
        
        //DIRECCION DEL CLIENTE 
        $this->load->model("system/info_engine");
        
        $id_adress = $this->info_engine
            ->set_adress(array(
              "dir1"    => $direccion1,
              "dir2"    => $direccion2,
              "pais"    => $pais,
              "depto"   => $depto,
              "ciudad"  => $ciudad,
              "local"   => $local 
        ));
        
        $id_contact = $this->info_engine
               ->set_contact(array(
            "tel1"          => $telefono,
            "tel2"          => $celular,
            "fax"           => $fax,
            "correo"        => $correo,
            "nombre"        => $contacto
        ));
        
        $this->load->model("clientes/new_cliente" , "cliente");
        $this->load->library("tools");
        
        $this->tools->default_timezone();
        $fecha  = $this->tools->current_date();
        
        $request = $this->cliente->Create(
                $id_adress , 
                $id_contact , 
                $id_adjunto , array(
                    "nombre"             => $nombre,
                    "descripcion"        => $desc,
                    "tipo"               => $tipo,
                    "nit"                => $nit,
                    "iva"                => $iva,
                    "fecha"              => $fecha
                ));
        
      
         redirect("0/clientes=new_cliente?s=" . $request);
        
    }
    
    public function Delete(){
        
        //CARGANDO LOS MODELS NECESARIOS 
         $this->load->model("user/user_auth" , "auth");
         $this->load->model("clientes/view_cliente" , "cliente");
         
         /**
          * SISTEMA DE SEGURIDAD 
          * VERIFICAMOS SI EL USAURIO ESTA LOGUEADO ADEMAS 
          * VERIFICAREMOS LOS PERMISOS DENTRO DE _rols()
          * LUEGO DE ESO VERIFICAMOS SI SU PERMISO ES GRANTED
          * EN DADO CASO SE DIO PERMISO LA BANDERA CAMBIA A CIERTO
          * ****/
         
         $auth              = isset($this->auth->get_auth['rol_nivel']) 
                                    ? $this->auth->get_auth['rol_nivel'] : NULL;
         $current_rols      = $this->cliente->_rols();
         $flag              = FALSE;
         
         foreach ($current_rols as $r){
             if($r == $auth){
                 $flag = TRUE;
                 break;
             }
         }
         
         if(!$flag){
             $this->output->set_output(false);
             return;
         }
         
         //FIN DE SEGURIDAD 
        
         
         $id = isset($_REQUEST['i']) ? $_REQUEST['i'] : NULL;
         
         if(is_null($id)) {
             $this->output->set_output(false);
             return;
         }
         
         $result = $this->cliente->Delete($id);
         
         if($result) {  $this->output->set_output(true); } 
         else {  $this->output->set_output(false); }
         
    }
    
    public function Show(){
        
        
        
        $id = isset($_REQUEST['i']) ? $_REQUEST['i'] : NULL;
        
        //IF IS NULL DESTROY ...
        if(is_null($id)) { $this->output->set_output(false) ; return ; }
        
        //MODEL CLIENTE
        $this->load->model("clientes/view_cliente" , "cliente");
        
        
        //DATA 
        $data = $this->cliente
                ->ShowClient($id);
        
        
        $this->output->set_output(json_encode($data));
        
    }
    
    public function Download(){
          
        $name           = isset($_REQUEST['n']) ? $_REQUEST['n'] : NULL;
        $document       = isset($_REQUEST['doc']) ? $_REQUEST['doc'] : NULL;
        $dir            = isset($_REQUEST['d']) ? $_REQUEST['d'] : NULL;
        
        if(is_null($name)){
            return null;
        }
        
        $exp        = explode(".", $name);
        $ext        = end($exp);
        
        $this->load->helper("url");
        
        $uri    = base_url("files/unitee/clientes/$dir/$document.$ext");
        
        header("Content-disposition: attachment; filename=$name");
        header("Content-type: application/octet-stream");
        readfile($uri);
        
    }
    
    public function DeleteFile(){
        
         $file      = $_REQUEST['f'];
         $dir       = $_REQUEST['d'];
         $id        = $_REQUEST['i'];
         $ext       = $_REQUEST['e'];
         
         $this->load->model("clientes/view_cliente" , "client");
         
         $adj = $this->client->GetAtt($id);
         
         $attach    = NULL;

         if(sizeof($adj) >= 1){
             $data = json_decode($adj[0]->adjunto);
             foreach ($data as $d){
                 $decode    = json_decode($d);
                 if($decode->file != $file){
                      $attach[] = json_encode($decode);
                 }
             }
         }

         $this->load->model("clientes/edit_cliente" , "edit");

         
         $success = $this->edit->EditAttach($adj[0]->id , json_encode($attach));
         
         if($success){
             
              $path = FCPATH . "files/unitee/clientes/$dir/$file.$ext";
              if(file_exists($path)){
                  unlink($path);
              }
              
              $this->output->set_output(TRUE);
         }else{
             $this->output->set_output(FALSE);
         }

    }
    
    
    public function Update(){
        
        $nombre                 = isset($_REQUEST['txt_nombre']) ? $_REQUEST['txt_nombre'] : NULL;
        $tipo                   = isset($_REQUEST['txt_tipo']) ? $_REQUEST['txt_tipo'] : NULL;
        $iva                    = isset($_REQUEST['txt_iva']) ? $_REQUEST['txt_iva'] : NULL;
        $nit                    = isset($_REQUEST['txt_nit']) ? $_REQUEST['txt_nit'] : NULL;
        $contacto               = isset($_REQUEST['txt_contacto']) ? $_REQUEST['txt_contacto'] : NULL;
        $telefono               = isset($_REQUEST['txt_telefono']) ? $_REQUEST['txt_telefono'] : NULL;
        $celular                = isset($_REQUEST['txt_celular']) ? $_REQUEST['txt_celular'] : NULL;
        $fax                    = isset($_REQUEST['txt_fax']) ? $_REQUEST['txt_fax'] : NULL;
        $correo                 = isset($_REQUEST['txt_correo']) ? $_REQUEST['txt_correo'] : NULL;
        $local                  = isset($_REQUEST['txt_local']) ? $_REQUEST['txt_local'] : NULL;
        $direccion1             = isset($_REQUEST['txt_direccion']) ? $_REQUEST['txt_direccion'] : NULL;
        $direccion2             = isset($_REQUEST['txt_direccion2']) ? $_REQUEST['txt_direccion2'] : NULL;
        $pais                   = isset($_REQUEST['txt_pais']) ? $_REQUEST['txt_pais'] : NULL;
        $depto                  = isset($_REQUEST['txt_depto']) ? $_REQUEST['txt_depto'] : NULL;
        $ciudad                 = isset($_REQUEST['txt_ciudad']) ? $_REQUEST['txt_ciudad'] : NULL;
        $desc                   = isset($_REQUEST['txt_desc']) ? $_REQUEST['txt_desc'] : NULL;
        
        $files                  = isset($_FILES['file']) ? $_FILES['file'] : array();
        
        $id_                    = isset($_REQUEST['i']) ? $_REQUEST['i'] : NULL;
        
        
        //VARIABLES DE RETORNO 
        $id_adjunto         = NULL;


        //CARGAMOS TODOS LOS HELPERS NECESARIOS 
        $this->load->helper(array('string', 'url', 'file', 'form'));
        $this->load->model("clientes/edit_cliente" , "edit");
        $this->load->model("clientes/view_cliente" , "client");
        $this->load->model("system/info_engine" );
         
        //NECESITAMOS EL ID DEL CLIENTE PARA HACER LAS MODIFICACIONES
        if($id_ == null ){
            redirect("0/");
            return;
        }
            
    
        if(!is_null(isset($files['name'][0]) ? $files['name'][0] : NULL) && count($files) >= 1){
            
            
            $data_ad            = $this->client->GetAtt($id_);
            $f                  = null;
            $id_ad              = null;
    
            
            $dir                = random_string("numeric");   
            
            
            if(sizeof($data_ad) >= 1){
                   $data   = !is_null($data_ad[0]->adjunto) ? $data_ad[0]->adjunto : null;
                   $id_ad  = $data_ad[0]->id ;  
                   $id_adjunto  = $id_ad;
                   if(!is_null($data)){
                        $data = json_decode( $data_ad[0]->adjunto);
                        foreach ($data as $d){
                                $decode    = json_decode($d);
                                $dir       = isset($decode->directory) 
                                            ? $decode->directory : random_string("numeric");
                                $f         =  $data ;
                                break;
                        }
                   }
            }
            

            
            if(!empty($files['tmp_name'][0])){
                
            //CARGAMOS LAS LIBRERIAS 
            $this->load->library("base_upload");
            
            //CREARMOS UN NUEVO DIRECTORIO PARA LA DATA DEL CLIENTE
    
            $directory          = "files/unitee/clientes/" . $dir . "/";
            
            
            //BEGIN BUG , si se elimina el directorio raiz clientes , colapsa el sistema
            //REPAIR: verificar si existe el directorio
            
            if(!file_exists(FCPATH . "files/unitee/clientes/")){
                mkdir($this->path ."files/unitee/clientes/" , 0777);
            }
            //END BUG 
            
            //CREACION DE UN DIRECTORIO
            if(!file_exists( $this->path . $directory)){
                mkdir($this->path . $directory, 0777);
            }
            
            
            $file_names     = []; //arreglo nombres que se sustituiran en los archivos
            $attach         = []; //todos los adjuntos para la base de datos 
            
           
            //SUBIMOS LOS ARCHIVOS AL SISTEMA 
            for($i= 0; $i < count($files['name']) ; $i++){
                $al           = random_string();
                $file_names[] = $al;
                $attach[]     = json_encode(array(
                    "file"          => $al ,
                    "name"          => $files['name'][$i],
                    "directory"     => $dir
                ));
            }
            
            if($f != null || !empty($f)){
                foreach ($f as $ff){
                    $attach[] = $ff;
                }
            }
            
            
            //SUBIR ARCHIVOS 
            $this->base_upload->set_path("./" . $directory);
            $this->base_upload->set_filename($file_names);
            $this->base_upload->Do_MultiUpload('file');
            
            
            //VERIFICAMOS SI YA EXISTE UN CAMPOD E ADJUNTO ANIDADO CON EL CLIENTE
            //EN DADO CASO NO SE CREARA UN ADJUNTO NUEVO 
            if(!is_null($id_ad)){
                $this->edit->EditAttach($id_ad , json_encode($attach));   
                $id_adjunto = $id_ad;
            }else{
                 $this->load->model("tshop/adjuntos" , "adj");
                  $id_adjunto   = $this->adj->Add(
                            json_encode($attach) , 
                            "cliente" ,
                            "Cod:" . random_string('alnum'));
            }
           }
          
        }
        
        
        $this->edit->EditClient(array(
            "nombre"            => $nombre,
            "descripcion"       => $desc,
            "id_adjunto"        => $id_adjunto,
            "tipo"              => $tipo,
            "nit"               => $nit,
            "iva"               => $iva
        ) , $id_);
        
        
        
        $inf = $this->client->GetInfoClient($id_);
        
        
        $this->info_engine->update_adress(array(
              "dir1"    => $direccion1,
              "dir2"    => $direccion2,
              "pais"    => $pais,
              "depto"   => $depto,
              "ciudad"  => $ciudad,
              "local"   => $local 
            ) , $inf[0]->direccion);
        
        
        $this->info_engine->update_contact(array(
                      "tel1"          => $telefono,
                      "tel2"          => $celular,
                      "fax"           => $fax,
                      "correo"        => $correo,
                      "nombre"        => $contacto
         ) , $inf[0]->contacto);
        
        
        
        redirect("0/clientes=edit_cliente?i=" . $id_ . "&s=1" );
        
       
    }
}
