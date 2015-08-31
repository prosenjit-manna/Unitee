<?php


class Metadata {
    
    var $class      = NULL;
    
    public function __construct() {
        
        $this->class = &get_instance();
        $this->class->load->database();
    }
    
    public function GetMeta($key){
        return $this->class
                ->db
                ->query("SELECT * FROM metadata WHERE metadata.key LIKE ?" , array($key))
                ->result()[0];
    }
    
    public function AddMeta($key , $value = NULL){
        $i = $this
                ->class
                ->db
                ->insert("metadata" , array(
                    "metadata.key"      => $key,
                    "metadata.value"    => $value
                ));
        if($i){
            return $this->class->db->insert_id();
        }else { return FALSE; }
    }
    
    public function UpdateMeta($key , $value){
        return $this->class->db
                ->update("metadata" , array(
                    "metadata.value"    => $value
                ), array(
                    "metadata.key" => $key
                ));
    }
    
    
    public function DeleteMeta($key){
        return $this->class->db->delete("metadata" , 
                array("metadata.key" => $key
        ));
    }
    
    
    
}
