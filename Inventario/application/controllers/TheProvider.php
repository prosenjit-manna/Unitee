<?php


class TheProvider extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function NewProvider(){
        $empresa = $_REQUEST['txt_empresa'];
        $contacto = $_REQUEST['txt_contacto'];
        $telefono = $_REQUEST['txt_telefono'];
        $celular = $_REQUEST['txt_celular'];
        $fax = $_REQUEST['txt_fax'];
        $correo = $_REQUEST['txt_correo'];
        $local = $_REQUEST['txt_local'];
        $direccion1 = $_REQUEST['txt_direccion1'];
        $direccion2 = $_REQUEST['txt_direccion2'];
        $pais = $_REQUEST['txt_pais'];
        $depto = $_REQUEST['txt_dpto'];
        $ciudad = $_REQUEST['txt_ciudad'];
    }
    
}
