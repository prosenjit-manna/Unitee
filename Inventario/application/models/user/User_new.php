<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de crear un nuevo usuario 
 * @@id : _user_001
 */


get_instance()->load->interfaces("Interface");

class User_new extends CI_Model implements PInterface{
    
    
    protected $model   = "user_new";


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function _css() {
        //ACA IRAN TODOS LOS CSS 
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("usuario/new");
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        //ACA IRAN TODOS LOS JAVASCRIPT
    }

    public function _jsLoader() {
        
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, 
                MODEL , 
                INT
         );
        
        return $data;
    }

    public function _title() {
        return "Unitee | Nuevo Usuario";
        
    }

    public function _update() {
        //ACTUALIZACION DEL MODULO UPDATE
    }


    public function _unistall() {
        //DESISTALACION 
    }
    
    public function CreateUser(array $data){
        $id_login = $this->db
                         ->insert("login" , $data);
        
        if($id_login){
            return $this->db->insert_id();
        }else{
            return null;
        }
    }
    
    public function CreatePerfil(array $data){
        return $this->db->insert("user" , $data);
    }

}
