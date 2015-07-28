<?php

class User_Auth extends CI_Model {
    
    
    var $get_auth       = array();
    
    var $get_id         = NULL;
    
    var $get_usr        = NULL;
    
    protected $query    = NULL;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function Auth($usr , $pwd , $email = NULL){
        

        $this->query = NULL;
        $this->query = "SELECT concat(user.nombres, ' ' , user.apellidos ) "
                     . " as 'name' , login.user as 'user' , login.password as 'password' "
                     . " , login.status as 'status' , login.last_date as 'last_date' "
                     . " , roles.nombre as 'rol_name' , roles.nivel as 'rol_nivel'"
                     . " FROM user "
                     . " INNER JOIN login ON login.id_login=user.id_login "
                     . " INNER JOIN roles ON roles.id_rol=user.id_rol ";
        
        $request = $this->db->query($this->query , array());
       
    }
    
    
    
}
