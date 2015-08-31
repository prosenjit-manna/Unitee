<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de crear un nuevo usuario 
 * @@id : _provider_001
 */


get_instance()->load->interfaces("Interface");
get_instance()->load->interfaces("PluginConfig");

class New_proveedor extends CI_Model implements PInterface{
    
    use PluginConfig;
    
    protected $model   = "new_proveedor";


    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        
        $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Nuevo Proveedor",
                "description"   => "Modulo para agregar proveedor",
                "id_model"      => "001",
                "id_update"     => "004",
                "update"        => "",
                "license"       => "",
                "controller"    => "",
                "view"          => "producto/producto_new"
        );
    }
    
    public function _css() {
        //ACA IRAN TODOS LOS CSS 
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("proveedor/proveedor_new");
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT
    }

    public function _jsLoader() {
        return array("load_paises();", "load();","validate_margen();");
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, 
                MODEL , 
                INT
         );
        
        return $data;
    }

    public function _title() {
        return "Unitee | Nuevo Proveedor";
        
    }

    public function _update() {
        //ACTUALIZACION DEL MODULO UPDATE
    }


    public function _unistall() {
        //DESISTALACION 
    }
    
    public function set_new($codigo , $nombre , $descripcion , $id_direccion , $id_contacto){
        
        $date   = new DateTime("now");
        $current_d  = $date->format("Y-m-d H:m:s");
        
        return $this->db->insert("proveedor" , array(
            "codigo"            => $codigo,
            "nombre"            => $nombre,
            "descripcion"       => $descripcion,
            "id_direccion"      => $id_direccion,
            "id_contacto"       => $id_contacto,
            "fecha"             => $current_d
        ));
    }

    public function _Getconfig() {
        return $this->_config;
    }

    public function _widgets() {
        
    }

    public function _operations() {
        
    }

}
