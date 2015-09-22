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

class New_cliente extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model        = "new_cliente";
    var $route              = null;

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->_config = array(
            "version" => 1.0,
            "author" => "Lieison S.A de C.V",
            "type" => "view",
            "name" => "Ver clientes",
            "description" => "Modulo para crear clientes",
            "id_model" => "003",
            "id_update" => "005",
            "update" => "",
            "license" => "",
            "controller" => "",
            "view" => "clientes/cliente_new"
        );

        $this->load->library("base_url");
        $this->route = base_url();
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css",
            $this->route . "assert/plugins/jquery-file-upload/css/jquery.fileupload.css",
            $this->route . "assert/plugins/jquery-file-upload/css/jquery.fileupload-ui.css"
        );
    }

    public function _init() {
        $this->load->helper("form");
      $this->load->view("clientes/cliente_new");
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        return array(
            $this->route . "assert/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js",
            $this->route . "assert/plugins/jquery-file-upload/js/vendor/tmpl.min.js",
            $this->route . "assert/plugins/jquery-file-upload/js/vendor/load-image.min.js",
            $this->route . "assert/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js",
            $this->route . "assert/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.iframe-transport.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.fileupload.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.fileupload-process.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.fileupload-image.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.fileupload-audio.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.fileupload-video.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.fileupload-validate.js",
            $this->route . "assert/plugins/jquery-file-upload/js/jquery.fileupload-ui.js"
        );
    }

    public function _jsLoader() {
       return array(
        "load_paises();",
        "FormFileUpload.init();" ,
         "LoadValidation();" ,
         "init_client();");
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, MODEL, INT
        );
        return $data;
    }

    public function _title() {
        return "Unitee | Ver clientes";
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

    public function _operations() {
        $this->load->model("system/permission_engine", 'engine');
        $data = $this->engine->GetOperationRoles($this->model);
        return $data;
    }

    public function _Dashboard() {
        
    }

    public function _JSdashboard() {
        
    }
}