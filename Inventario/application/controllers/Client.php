<?php


class Client extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function index(){
        //CLIENTE SIN INDEX ...
    }
    
    public function Add(){
        
        $nombre                 = isset($_REQUEST['txt_nombre']) ? $_REQUEST['txt_nombre'] : NULL;
        $tipo                   = isset($_REQUEST['txt_tipo']) ? $_REQUEST['txt_tipo'] : NULL;
        $iva                    = isset($_REQUEST['txt_iva']) ? $_REQUEST['txt_iva'] : NULL;
        $nit                    = isset($_REQUEST['txt_nit']) ? $_REQUEST['txt_nit'] : NULL;
        $empresa                = isset($_REQUEST['txt_empresa']) ? $_REQUEST['txt_empresa'] : NULL;
        $contacto               = isset($_REQUEST['txt_contacto']) ? $_REQUEST['txt_contacto'] : NULL;
        $telefono               = isset($_REQUEST['txt_telefono']) ? $_REQUEST['txt_telefono'] : NULL;
        $celular                = isset($_REQUEST['txt_celular']) ? $_REQUEST['txt_celular'] : NULL;
        $fax                    = isset($_REQUEST['txt_fax']) ? $_REQUEST['txt_fax'] : NULL;
        $correo                 = isset($_REQUEST['txt_correo']) ? $_REQUEST['txt_correo'] : NULL;
        $local                  = isset($_REQUEST['txt_local']) ? $_REQUEST['txt_local'] : NULL;
        $direccion              = isset($_REQUEST['txt_direccion']) ? $_REQUEST['txt_direccion'] : NULL;
        $direccion2             = isset($_REQUEST['txt_direccion2']) ? $_REQUEST['txt_direccion2'] : NULL;
        $pais                   = isset($_REQUEST['txt_pais']) ? $_REQUEST['txt_pais'] : NULL;
        $depto                  = isset($_REQUEST['txt_depto']) ? $_REQUEST['txt_depto'] : NULL;
        $ciudad                 = isset($_REQUEST['txt_ciudad']) ? $_REQUEST['txt_ciudad'] : NULL;
        $desc                   = isset($_REQUEST['txt_desc']) ? $_REQUEST['txt_desc'] : NULL;
        
        $files                  = isset($_FILES['file']) ? $_FILES['file'] : NULL;
        
        print_r($_FILES);
    }
    
    
}
