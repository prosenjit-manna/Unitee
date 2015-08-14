<?php

defined("NAME") or define("NAME", 0);
defined("MODEL") or define("MODEL", 1);
defined("ID") or define("ID", 2);
defined("INT") or define("INT", 0);
defined("STRING") or define("STRING", 1);

class Permission_engine extends CI_Model {
    
   
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper("setup");
        
    }
    
    
    public function _get($value , $type = NAME  , $format = INT){
       
        $data       = NULL;
        
        switch($type){
            case NAME:
                $data = $this->get_name($value);
                BREAK;
            case MODEL:
                $data = $this->get_model($value);
                BREAK;
            case ID:
                $data = $this->get_id($value);
                BREAK;
        }
        
        if(count($data) == 0){
            return null;
        }
        
        switch ($format){
            case INT:
                $data = explode(",", $data[0]->roles);
                break;
            case STRING:
                $data       = explode(",", $data[0]->roles);
                $modal      = array();
                foreach($data as $v){
                   $result = $this->db
                                  ->query("SELECT nombre as 'name' FROM roles WHERE nivel LIKE $v")
                                  ->result();
                   if(count($result) >= 1){
                       $modal[] = $result[0]->name;
                   }
                }
                $data = $modal;
                break;
        }
        
        return $data;    
        
    }
    
    
    private function get_name($value){
        return $this->db
                ->query("SELECT roles FROM sidebar WHERE name LIKE '%$value%' ")
                ->result();
    }
    
    private function get_model($value){
        return $this->db
                ->query("SELECT roles FROM sidebar WHERE model LIKE '$value' ")
                ->result();
    }
    
    private function get_id($value){
        return $this->db
                ->query("SELECT roles FROM sidebar WHERE id_sidebar LIKE $value ")
                ->result();
    }
    
    
    public function GetDataRol($current_rol , $sub_rol){

        if($sub_rol != 0 || !empty($sub_rol)){
            
            $p      = explode(",", $sub_rol);
            if(sizeof($p) >=2){
                 $r                 = $current_rol;
                 $current_rol       = array();
                 $current_rol[]     = $r;
                 foreach ($p as $v){ $current_rol[] = $v; }
            }else{
                  
                $current_rol = array(
                    0   => $current_rol ,
                    1   => current($p)
                );
            }}
            
            return $current_rol;
    }
    
}
