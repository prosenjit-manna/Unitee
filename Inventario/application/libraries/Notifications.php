<?php

class Notifications
{
    
    var $class          = NULL;
    
    protected $data     = [];

    protected $query    = NULL;

    public function __construct() {
        $this->class = &get_instance();
        $this->class->load->database();
    }
    
    public function GetNofication(){
        
    }
    
    
    public function Show()
    {
        $this->query = "SELECT "
                        . " id_notification as 'id' ,"
                        . " id_object as 'object_id' ,"
                        . " table_object as 'object_table',"
                        . " description as 'description' ,"
                        . " last_date as 'date' ,"
                        . " redirect , "
                        . " status , "
                        . " notification.read ,"
                        . " id_roles as 'rols' ,"
                        . " id_user as 'user' "
                        . " FROM notification WHERE status LIKE 1 AND notification.read LIKE 0"
                        . " ORDER BY last_date ";
            
        $this->data = $this
                        ->class
                        ->db->query($this->query)
                        ->result();
        
        return $this->data;
    }
    
    
   
}