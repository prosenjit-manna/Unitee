<?php

defined("NAME") or define("NAME", 0);
defined("MODEL") or define("MODEL", 1);
defined("ID") or define("ID", 2);

class Permission_engine extends CI_Model {
    
   
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper("setup");
        
    }
    
    
    public function GetTheName($value , $type = NAME){
        switch($type){
            case NAME:
                BREAK;
            case MODEL:
                BREAK;
            case ID:
                BREAK;
        }
    }
    
    public function GetTheId(){
        
    }
    
}
