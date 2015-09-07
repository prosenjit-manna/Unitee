<?php


class Metadata {
    
    var $class      = NULL;
    
    public function __construct() {
        
        $this->class = &get_instance();
        $this->class->load->database();
    }
    
    /**
     * @author Rolando Antonio Arriaza 
     * @todo Obtenemos el valor del meta por medio de un objeto 
     *          $result->key , $result->value 
     * @param string $key llave de la meta
     * **/
    public function GetMeta($key){
        return $this->class
                ->db
                ->query("SELECT * FROM metadata WHERE metadata.key LIKE ?" , array($key))
                ->result()[0];
    }
    
      /**
     * @author Rolando Antonio Arriaza 
     * @todo Creamos una nueva metadata con su llave y valor 
     * @param string $key llave de la meta
     * @param string/mixed $value opcional como valor de la meta , puede ser null 
     * **/
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
    
    /**
     * @author Rolando Antonio Arriaza 
     * @todo Actualizamos la metadata 
     * @param string $key llave de la meta
     * @param string/mixed $value opcional como valor de la meta , puede ser null 
     * **/
    public function UpdateMeta($key , $value){
        return $this->class->db
                ->update("metadata" , array(
                    "metadata.value"    => $value
                ), array(
                    "metadata.key" => $key
                ));
    }
    
    
     /**
     * @author Rolando Antonio Arriaza 
     * @todo Creamos una nueva metadata con su llave y valor 
     * @param string $key llave de la meta a eliminar
     * **/
    public function DeleteMeta($key){
        return $this->class->db->delete("metadata" , 
                array("metadata.key" => $key
        ));
    }
    
    
    
}
