<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de crear un nuevo usuario 
 * @@id : _producto_001
 */

get_instance()->load->interfaces("Interface");
get_instance()->load->interfaces("PluginConfig");

class New_producto extends CI_Model  implements PInterface {
    
    use PluginConfig;
    
    protected $model   = "new_producto";
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        
        $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Nuevo Producto",
                "description"   => "Modulo para nuevo producto",
                "id_model"      => "003",
                "id_update"     => "003",
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
        $this->load->view("producto/producto_new" , array("dump" => $this->_Getconfig()));
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT
    }

    public function _jsLoader() {
         return array("load_colors();");
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
        return "Unitee | Nuevo producto";
        
    }

    public function _update() {
        //ACTUALIZACION DEL MODULO UPDATE
    }


    public function _unistall() {
        //DESISTALACION 
    }

    public function _Getconfig() {
        return $this->_config;
    }
    
    public function get_colors(){
        
    }

}
   