<?php

get_instance()->load->interfaces("Interface");


class User_Profile extends CI_Model implements PInterface {
    
    protected $route = NULL; 

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
    }

    public function _footer() {
       return array(
           $this->route . "assert/perfil/js/profile.js"
       );
    }

    public function _header() {
       return array(
           $this->route . "assert/perfil/css/profile.css",
           $this->route . "assert/perfil/css/profile-old.css"
       );
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("usuario/perfil");
    }

    public function _install() {
        //NO SE NECESITA INSTALACION SERA PARTE DEL SISTEMA
    }

    public function _update() {
         //NO SE NECESITA ACTUALIZAR SERA PARTE DEL SISTEMA 
    }

    public function _jsLoader() {
       return null;
    }

}
