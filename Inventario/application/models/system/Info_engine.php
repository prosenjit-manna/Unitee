<?php


class Info_engine extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function set_adress(array $adress){
        $e = $this->db->insert("direccion" , $adress); 
        if($e){
            return $this->db->insert_id();
        }else{
            return NULL;
        }
    }
    
    
    public function set_contact(array $contact){
        $e = $this->db->insert("contacto" , $contact); 
        if($e){
            return $this->db->insert_id();
        }else{
            return NULL;
        }
    }
    
    public function update_adress(array $adress , $id){
         $this->db->where(array("id_direccion" => $id ));
         return $this->db->update("direccion" , $adress);
    }
    
    public function update_contact(array $contact , $id){
         $this->db->where(array("id_contacto" => $id ));
         return $this->db->update("contacto" , $contact);
    }
    
    
    
}
