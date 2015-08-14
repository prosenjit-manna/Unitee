<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: Editar Usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de editar un usuario 
 * @@id : _user_001
 */

get_instance()->load->interfaces("Interface");

class User_edit extends CI_Model implements PInterface{

    var $route = NULL;
    
    protected  $model = "user_edit";

    public function __construct() {
        parent::__construct();
        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
    }

    public function _css() {
         return array(
           $this->route . "assert/plugins/bootstrap-toastr/toastr.min.css",
            $this->route . "assert/perfil/css/profile.css",
           $this->route . "assert/perfil/css/profile-old.css"
       );
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("usuario/edit");
    }

    public function _install() {

    }

    public function _js() {
         return array(
            $this->route . "assert/plugins/bootstrap-toastr/toastr.min.js",
            $this->route . "assert/plugins/bootstrap-toastr/ui-toastr.js"

       );
    }

    public function _jsLoader() {
          return array( "i();" , "c();" , "");
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
        return "Unitee | Editar Usuario";

    }

    public function _update() {

    }

    public function _unistall() {
        
    }


}
