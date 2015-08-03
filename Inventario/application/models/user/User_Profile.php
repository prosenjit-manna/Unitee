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
       return null;
    }

    public function _header() {
       return null;
    }

    public function _init() {
          
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
