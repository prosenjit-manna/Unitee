<?php

class MY_Loader extends CI_Loader {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function interfaces($interface){
        require_once APPPATH . "/interfaces/$interface" . ".php";
    }
    
    public function complement($complement_name){
         require_once APPPATH . "/complement/$complement_name" . ".php";
    }
    
    public function controllers($controller){
        require_once APPPATH . "/controllers/$controller" . ".php";
    }
    
    public function templates($template){
        $path =  APPPATH . "/templates/$template" . ".php";
        if(file_exists($path)){
            return file_get_contents($path);
        }
    }
 
}
