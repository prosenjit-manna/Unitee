<?php

class User_Auth extends CI_Model {
    
    
    var $get_auth       = array();
    
    var $get_id         = NULL;
    
    var $get_usr        = NULL;
    
    protected $query    = NULL;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->library('session');
    }
    
    public function Auth($usr , $pwd , $type = "user"){
        
        $this->load->library('encryption');
        
        $t = "login.user";
        
        
        if($type === "email"){
            $t = "user.email";
        }

        $this->query = NULL;
        
        
        $this->query = "SELECT concat(user.nombres, ' ' , user.apellidos ) "
                     . " as 'name' , login.user as 'user' , login.password as 'password' "
                     . " , login.status as 'status' , login.last_date as 'last_date' "
                     . " , roles.nombre as 'rol_name' , roles.nivel as 'rol_nivel'"
                     . " FROM user "
                     . " INNER JOIN login ON login.id_login=user.id_login "
                     . " INNER JOIN roles ON roles.id_rol=user.id_rol "
                     . " WHERE $t LIKE ? AND login.password LIKE ?";
        
        $request = $this->db
                        ->query($this->query , array(
                            $this->encryption->encrypt($usr) , 
                            $pwd
                        ))
                        ->result_array();
        
        if(empty($request))
        {
            return FALSE;
        }
        
        
        if(isset($this->session->user))
        {
            $this->session->unset_userdata('user');
        }
        
        $this->session->user = array(
            
        );
        
        return TRUE;

       
    }
    
    
    
}
