<?php

class System {
    
    
    private $class      = NULL;
    
    public function __construct() {
         $this->class = &get_instance();
         $this->class->load->library("session");
    }
    
    public function VerifyPrivs($privs){
        $priv_flag          = FALSE;
        
        if($privs != NULL){
                if(is_array($privs)){
                    foreach ($privs as $p){
                        if(strcmp($this->class->session->user['rol_name'], $p) === 0){
                           $priv_flag = TRUE;
                        }
                        else if($this->class->session->user['rol_nivel'] == $p){
                           $priv_flag = TRUE;
                        }
                    } 
                }
                else if(is_string($privs)){
                    $parts  = explode(",", $privs);
                    foreach ($parts as $p){
                        if(strcmp($this->class->session->user['rol_name'], $p) === 0){
                           $priv_flag = TRUE;
                        }
                        else if($this->class->session->user['rol_nivel'] == $p){
                           $priv_flag = TRUE;
                        }
                    }
                }
            }else if($privs === NULL){ $priv_flag = TRUE; }
            
            return $priv_flag;
    }
    
}
