<?php

class Notifications
{
    
    var $class          = NULL;
    
    protected $data     = [];

    protected $query    = NULL;

    public function __construct() 
    {
        $this->class = &get_instance();
        $this->class->load->database();
    }
    
    public function GetNofication($read= 0 , $all = FALSE)
    {
        
         $this->class->load->model("user/user_auth" , "auth");
         
         $roles                 = $this->class->auth->roles;
         $user                  = $this->class->auth->get_usr;
         $notifications         = $this->Show($read , $all);
         
         $filter                = [];
         
         
         $sub_level             = $roles['sub_nivel'] >= 1 ? $roles['sub_nivel'] : NULL;
         $level                 = $roles['nivel'] >= 1 ? $roles['nivel'] : NULL;
         
         $level_merger          =  $sub_level != NULL ? $level . "," . $sub_level : $level;
    
         foreach ($notifications as $k=>$n){
             $n_rol         = explode(",", $n->rols);
             $n_user        = $n->user;
             
             if(!is_null($n_user)){
                if(strcmp($user, $n_user) == 0){
                    $filter[] = $notifications[$k];
                }
             }else{
                  $l = explode(",", $level_merger);
                  foreach ($l as $v){
                      foreach ($n_rol as $r){
                          if(strcmp($v, $r) == 0){
                              $filter[] = $notifications[$k];
                              break;
                          }
                      }
                  }
             }
             
         }
         
         return $filter;
    }
    
    
    public function Show($read= 0 , $all = FALSE)
    {
        if(!$all){
            $this->query = "SELECT "
                        . " id_notification as 'id' ,"
                        . " id_object as 'object_id' ,"
                        . " table_object as 'object_table',"
                        . " description as 'description' ,"
                        . " last_date as 'date' ,"
                        . " redirect , "
                        . " status , "
                        . " alert ,"
                        . " icon ,"
                        . " notification.read ,"
                        . " id_roles as 'rols' ,"
                        . " id_user as 'user' "
                        . " FROM notification WHERE status LIKE 1 AND "
                        . " notification.read LIKE $read"
                        . " ORDER BY last_date ";
        }
        else{
             $this->query = "SELECT "
                        . " id_notification as 'id' ,"
                        . " id_object as 'object_id' ,"
                        . " table_object as 'object_table',"
                        . " description as 'description' ,"
                        . " last_date as 'date' ,"
                        . " redirect , "
                        . " status , "
                        . " alert ,"
                        . " icon ,"
                        . " notification.read ,"
                        . " id_roles as 'rols' ,"
                        . " id_user as 'user' "
                        . " FROM notification WHERE status LIKE 1 "
                        . " ORDER BY last_date ";
        }
            
        $this->data = $this
                        ->class
                        ->db->query($this->query)
                        ->result();
        
        $this->class
                ->load
                ->library("tools");
        
        for($i = 0; $i < count($this->data) ; $i++){
            $this->data[$i]->date = $this
                    ->class
                    ->tools
                    ->PrettyDate($this->data[$i]->date);
        }
        
        return $this->data;
    }
    
    
    public function IsRead($id , $read = TRUE)
    {
        switch ($read){
            case TRUE;
               return $this->class
                        ->db
                        ->update("notification"  , 
                                array("read" => 1), 
                                array("id_notification" => $id )
                         );
            case FALSE:
                 return $this->class
                        ->db
                        ->update("notification"  , 
                                array("read" => 0), 
                                array("id_notification" => $id )
                         );
        }
    }
    
    
public function AddNotification($table , 
        $object , 
        $description , 
        $redirect , 
        $icon ,
        $alert,
        $roles = NULL ,
        $user = NULL)
{
    
   $this->class->load->library("tools");
            
   $this->class->tools->default_timezone();
   
   $current_date    = $this->class->tools->current_datetime();
    
   return $this->class->db->insert("notification" , array(
       "id_object"              => $object,
       "table_object"           => $table,
       "id_roles"               => $roles,
       "id_user"                => $user,
       "alert"                  => $alert,
       "description"            => $description,
       "redirect"               => $redirect,
       "icon"                   => $icon,
       "last_date"              => $current_date,
       "status"                 => 1,
       "read"                   => 0
   ));
        
}


public function UpdateNotification($id_notification , $status ,
        $description = NULL ,
        $redirect = NULL,
        $roles = NULL , 
        $user = NULL)
{
    
    $rebase     = [];
    
    if(!is_null($description)){
        $rebase["description"] = $description;
    }
    if(!is_null($redirect)){
        $rebase['redirect'] = $redirect;
    }
    if(!is_null($roles)){
        $rebase['id_roles'] = $roles;
    }
    if(!is_null($user)){
        $rebase['id_user'] = $user;
    }
    
    $rebase['status']   = $status;
    $rebase['read']     = 0;
    
    return $this->class->db->update("notification" , 
            $rebase , 
            array("id_notification" => $id_notification));
    
}
    
   
}