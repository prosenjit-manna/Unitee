<?php

defined("NAME") or define("NAME", 0);
defined("MODEL") or define("MODEL", 1);
defined("ID") or define("ID", 2);
defined("INT") or define("INT", 0);
defined("STRING") or define("STRING", 1);

class Permission_engine extends CI_Model {
    
   
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper("setup");
        
    }
    
    
    public function _get($value , $type = NAME  , $format = INT){
       
        $data       = NULL;
        
        switch($type){
            case NAME:
                $data = $this->get_name($value);
                BREAK;
            case MODEL:
                $data = $this->get_model($value);
                BREAK;
            case ID:
                $data = $this->get_id($value);
                BREAK;
        }
        
        if(count($data) == 0){
            return null;
        }
        
        switch ($format){
            case INT:
                $data = explode(",", $data[0]->roles);
                break;
            case STRING:
                $data       = explode(",", $data[0]->roles);
                $modal      = array();
                foreach($data as $v){
                   $result = $this->db
                                  ->query("SELECT nombre as 'name' FROM roles WHERE nivel LIKE $v")
                                  ->result();
                   if(count($result) >= 1){
                       $modal[] = $result[0]->name;
                   }
                }
                $data = $modal;
                break;
        }
        
        return $data;    
        
    }
    
    private function get_name($value){
        return $this->db
                ->query("SELECT roles FROM sidebar WHERE name LIKE '%$value%' ")
                ->result();
    }
    
    private function get_model($value){
        return $this->db
                ->query("SELECT roles FROM sidebar WHERE model LIKE '$value' ")
                ->result();
    }
    
    private function get_id($value){
        return $this->db
                ->query("SELECT roles FROM sidebar WHERE id_sidebar LIKE $value ")
                ->result();
    }
    
    public function GetDataRol($current_rol , $sub_rol){

        if($sub_rol != 0 || !empty($sub_rol)){
            
            $p      = explode(",", $sub_rol);
            if(sizeof($p) >=2){
                 $r                 = $current_rol;
                 $current_rol       = array();
                 $current_rol[]     = $r;
                 foreach ($p as $v){ $current_rol[] = $v; }
            }else{
                  
                $current_rol = array(
                    0   => $current_rol ,
                    1   => current($p)
                );
            }}
            
            return $current_rol;
    }
    
    /**
     * Esta funcion sirve para obtener permisos de operaciones u otras funciones 
     * que en un modulo solo ciertos usuarios deben de tener 
     * 
     * ejemplo : necesitamos darle permisos de solo ver a un rol distinto de admin 
     *           y por ello necesitamos deshabilitar el eliminar y editar si lo tiene 
     * 
     * desarrollamos nuestra estructura de permisos de operaciones en json file
     * 
     *      ejemplo:  
     * 
     *              {"edit" : "1,2" , "delete": "1" , "view": "1,2"}
     * 
     *le dimos permiso a los roles para edit , el rol 1 y 2 , delete el rol 1 y asi ...
     *la funcion busca que roles tiene el usuario actual o un sub_rol 
     * 
     * y retorna un array con las operaciones habilitadas o deshabilitadas 
     * 
     *          array("edit" => true , "delete" => false , ... );
     * 
     * la funcion luego de retorar estos valores se puede utilizar tanto como en la interface
     * como independientemente , claro esta la interface seria lo correcto como buena practica
     * la interfaces se llama _operations(){}
     * debe de devolver el valor de la funcion 
     * 
     */
    public function GetOperationRoles($sidebar){
        
         $info = $this->db
                ->query("SELECT operations FROM sidebar WHERE model LIKE '$sidebar' ")
                ->result()[0];
         
         if(is_null($info->operations)){
             return NULL;
         }
         
         $decode = json_decode($info->operations);
         if(is_null($decode) || !$decode){
             return NULL;
         }
         
         $this->load->model("user/user_auth" , "user");
         $roles = $this->user->roles;
         
         $code = [];
         
         foreach ($decode as $k=>$v){
             $explode = explode(",", $v);
             foreach ($explode as $id){
                 if($id == $roles['nivel'] || $id == $roles['sub_nivel']){
                     $code[$k] = TRUE;
                     break;
                 }else{
                     $code[$k] = FALSE;
                 }
             }
         }
         
        
         
         return $code;
         
    }
    
    
   
}
