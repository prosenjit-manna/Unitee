<?php


class Plugin_Model extends CI_Model {
    
    protected $query    = NULL;


    public function __construct() {
         parent::__construct();
         $this->load->database();
     }
     
     public function search_plugin($name , $controller = NULL){
         
         $this->query = "SELECT COUNT(*) as 'c'"
                 . " FROM modulos WHERE nombre LIKE ? or controller LIKE ?";
         
         $result = $this->db
                 ->query($this->query , array($name , $controller))
                 ->result_object()[0];
         
         
         if($result->c >= 1){
             return TRUE;
         }

         return FALSE;
         
     }
    
}
