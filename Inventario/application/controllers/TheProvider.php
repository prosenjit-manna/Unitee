<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.0
 * @@type: plugin
 * @@name: TheProvider
 * @@description : controlador de proveedores
 * @@id : _provider_001
 */


class TheProvider extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->library("session");
        if(!is_array($this->session->user))
        {
            redirect("Login/");
            return;
        }
        
    }
    
    public function NewProvider(){
        
        
        $empresa        = $_REQUEST['txt_empresa'];
        
        $contacto       = $_REQUEST['txt_contacto'];
        $telefono       = $_REQUEST['txt_telefono'];
        $celular        = $_REQUEST['txt_celular'];
        $fax            = $_REQUEST['txt_fax'];
        
        $correo         = $_REQUEST['txt_correo'];
        $local          = $_REQUEST['txt_local'];
        
        $direccion1     = $_REQUEST['txt_direccion1'];
        $direccion2     = $_REQUEST['txt_direccion2'];
        
        
        $pais               = isset($_REQUEST['txt_pais']) ?  $_REQUEST['txt_pais'] : NULL;
        $depto              = isset($_REQUEST['txt_pais']) ? $_REQUEST['txt_depto'] : NULL;
        $ciudad             = isset($_REQUEST['txt_pais']) ? $_REQUEST['txt_ciudad'] : NULL;
        $decripcion         = isset($_REQUEST['txt_descripcion']) ? $_REQUEST['txt_descripcion'] : NULL;
        
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
        
     
       $codigo  = "PROV" . rand(10, 2000) . substr($empresa, 0 , 3) ;
      
       $this->load->model("proveedor/new_proveedor");
       $this->load->helper("url");
       
       $ok = $this->new_proveedor->set_new($codigo , 
               $empresa , $decripcion  , 
               $id_adress ,
               $id_contact);
       
       if($ok){
           redirect("/0/?msj=prov&err=0");
           return;
       }else{
           redirect("/0/?msj=prov&err=1");
           return;
       }
        
    }
    
    public function EditProvider(){
        
        $id                 = $_REQUEST['the_id'];
        
        $empresa            = $_REQUEST['txt_empresa'];
        
        $contacto           = $_REQUEST['txt_contacto'];
        $telefono           = $_REQUEST['txt_telefono'];
        $celular            = $_REQUEST['txt_celular'];
        $fax                = $_REQUEST['txt_fax'];
        
        $correo             = $_REQUEST['txt_correo'];
        $local              = $_REQUEST['txt_local'];
        
        $direccion1         = $_REQUEST['txt_direccion1'];
        $direccion2         = $_REQUEST['txt_direccion2'];
        
        $pais               = isset($_REQUEST['txt_pais']) ?  $_REQUEST['txt_pais'] : NULL;
        $depto              = isset($_REQUEST['txt_pais']) ? $_REQUEST['txt_depto'] : NULL;
        $ciudad             = isset($_REQUEST['txt_pais']) ? $_REQUEST['txt_ciudad'] : NULL;
        $decripcion         = isset($_REQUEST['txt_descripcion']) ? $_REQUEST['txt_descripcion'] : NULL;
        
        $this->load->model("system/info_engine");
        $this->load->model("proveedor/view_proveedor");
        $this->load->model("proveedor/edit_proveedor");
        $this->load->model("system/info_engine");
        $this->load->helper("url");
        

        $data                       = $this->view_proveedor->get_provider($id);
        $id_contacto                = $data->id_contacto;
        $id_direccion               = $data->id_direccion;
        
        $ok = $this->edit_proveedor->update_provider($id , $empresa , $decripcion);
        if($ok){
            $ok = $this->info_engine->update_adress(array(
              "dir1"    => $direccion1,
              "dir2"    => $direccion2,
              "pais"    => $pais,
              "depto"   => $depto,
              "ciudad"  => $ciudad,
              "local"   => $local 
            ) , $id_direccion);
            if($ok){
                $this->info_engine->update_contact(array(
                      "tel1"          => $telefono,
                      "tel2"          => $celular,
                      "fax"           => $fax,
                      "correo"        => $correo,
                      "nombre"        => $contacto
                ) , $id_contacto);
            }
        }
        
       
       if($ok){
           redirect("/0/proveedor=edit_proveedor?id=" . $id );
           return;
       }else{
           redirect("/0/?msj=prov&err=1");
           return;
       }
    }
    
    public function ViewProvider(){
        
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        if(is_null($id)){
            echo false;
            return;
        }
        $this->load->model("proveedor/view_proveedor");
        $data = $this->view_proveedor->get_provider($id);
        echo json_encode($data);
        exit();
    }
   
    public function DelProvider(){
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
        if(is_null($id)){
            echo false;
            return;
        }
        $this->load->model("proveedor/view_proveedor");
        $this->view_proveedor->del_provider($id);
        exit();
    }

    
}
