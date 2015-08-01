<?php

class MY_Loader extends CI_Loader {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function interfaces($interface){
        require_once APPPATH . "/interfaces/$interface" . ".php";
    }
 
}
