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
}
