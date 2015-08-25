
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

class Conf_producto extends CI_Model implements PInterface{
    
    use PluginConfig;
    
    protected $model   = "conf_producto";

    var $route          = NULL;

    public function __construct() {
        
        $this->load->library("base_url");

        $this->route= base_url();

    }
    
    public function _css() {
       return array(
           $this->route . "assert/plugins/bootstrap-colorpicker/css/colorpicker.css",
           $this->route . "assert/plugins/jquery-minicolors/jquery.minicolors.css"
       );
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("producto/producto_conf");
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT 
         return array(
            $this->route . "assert/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js",
            $this->route . "assert/plugins/jquery-minicolors/jquery.minicolors.min.js",
            $this->route . "assert/plugins/components-form-tools.js",
            $this->route . "assert/plugins/components-form-tools2.js"
       );
    }

    public function _jsLoader() {
         return array("ComponentsFormTools2.init();");
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
        return "Unitee | Configuración de productos";
        
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

    public function _widgets() {
        
    }

}

