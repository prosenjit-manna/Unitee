<?php



get_instance()->load->interfaces("Interface");


class Test_Model extends CI_Model implements PInterface {
    
    public function __construct() {
        parent::__construct();
        $this->load->library("base_url");
    }

    public function _css() {
        
    }

    public function _init() {
        
    }

    public function _install() {
        
    }

    public function _js() {
        
    }

    public function _jsLoader() {
        
    }

    public function _title() {
        
    }

    public function _update() {
        
    }

}
