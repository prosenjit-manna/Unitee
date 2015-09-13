<?php


class Adjuntos extends CI_Model {
 
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->library("tools");
    }
    
    public function Add($data , $type = NULL , $comment = NULL){
        
        $this->tools->default_timezone();
      
        $date = $this->tools->current_datetime();
        
        $this->db->insert("adjunto" , array(
               "adjunto"    => $data,
               "tipo"       => $type,
               "comentario" => $comment,
               "fecha"      => $date
        ));
        
        return $this->db->insert_id();
    }
    
}
