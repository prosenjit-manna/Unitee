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

    public function __construct() {
        parent::__construct();
    }

    public function _css() {

    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("usuario/edit");
    }

    public function _install() {

    }

    public function _js() {

    }

    public function _jsLoader() {

    }

    public function _rols() {

    }

    public function _title() {
        return "Unitee | Editar Usuario";

    }

    public function _update() {

    }

    public function _unistall() {
        
    }


}
