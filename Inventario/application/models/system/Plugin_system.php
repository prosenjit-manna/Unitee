<?php

get_instance()->load->interfaces("Interface");

class Plugin_system extends CI_Model implements PInterface {
    
    
    var $count                  = 0;
    
    var $data                   = array();
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->library("base_url");
        $this->load->library("plugin");
        
        $this->data         = $this->plugin->_show();
        $this->count        = sizeof($this->data);
    }

    public function _css() {
        
    }

    public function _init() {
 
        $data = array(
           "data"           => $this->data,
           "count"          => $this->count
        );
        
        $this->load->helper("form");
        $this->load->view("plugins/plugin_view" , $data);
    }
    

    public function _install() {
        //SISTEMA 
    }

    public function _js() {
        
    }

    public function _jsLoader() {
        
    }

    public function _rols() {
        
    }

    public function _title() {
        
    }

    public function _unistall() {
        //SISTEMA
    }

    public function _update() {
        
    }


}
