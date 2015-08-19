<?php


class TheProvider extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function NewProvider(){
        $empresa        = $_REQUEST['txt_empresa'];
        
        $contacto       = $_REQUEST['txt_contacto'];
        $telefono       = $_REQUEST['txt_telefono'];
        $celular        = $_REQUEST['txt_celular'];
        $fax            = $_REQUEST['txt_fax'];
        
        $correo         = $_REQUEST['txt_correo'];
        $local          = $_REQUEST['txt_local'];
        
        $direccion1 = $_REQUEST['txt_direccion1'];
        $direccion2 = $_REQUEST['txt_direccion2'];
        
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
              "ciudad"  => $ciudad
        ));
        
       $id_contact = $this->info_engine
               ->set_contact(array(
            "tel1"          => $telefono,
            "tel2"          => $celular,
            "fax"           => $fax,
            "correo"        => $correo,
            "nombre"        => $contacto
        ));
        
     
       $codigo  = "PROV" . rand(2, 2000) . rand(20000, 50000);
      
       $this->load->model("proveedor/new_proveedor");
       
       $ok = $this->new_proveedor->set_new($codigo , 
               $empresa , null , 
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
    
}
