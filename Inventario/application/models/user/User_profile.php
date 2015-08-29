<?php

get_instance()->load->interfaces("Interface");


class User_Profile extends CI_Model implements PInterface {
    
    protected $route = NULL; 

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
    }

    public function _js() {
       return array(
           $this->route . "assert/perfil/js/profile.js",
           $this->route . "assert/perfil/js/bootstrap-fileinput.js"
       );
    }

    public function _css() {
       return array(
           $this->route . "assert/perfil/css/profile.css",
           $this->route . "assert/perfil/css/profile-old.css",
           $this->route . "assert/perfil/css/bootstrap-fileinput.css"
       );
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("usuario/perfil");
    }

    public function _install() {
        //NO SE NECESITA INSTALACION SERA PARTE DEL SISTEMA
    }

    public function _update() {
         //NO SE NECESITA ACTUALIZAR SERA PARTE DEL SISTEMA 
    }

    public function _jsLoader() {
        
        $inits_elements = 'var user_init = function() { '
                . 'document.getElementById("cmd_cambiar").disabled = true; }; '
                . 'user_init(); ';
                
        return array($inits_elements);
    }

    public function _title() {
        return "Unitee | Perfil";
    }
    
    public function _rols() {
        return NULL;
    }
    
    
    public function change_password($new_password){
        $this->db->where("id_login" , $this->session->user['id_login']);
        return $this->db->update("login" , array(
            "password"          => $new_password,
            "password_state"    => 1
        ));
    }
    
    public function change_avatar($avatar){
        $this->db->where("id_user" , $this->session->user['id_user']);
        return $this->db->update("user" , array(
            "avatar"      => $avatar
        ));
    }
    
    
    public function exist_user($name){
        $query = $this->db
                ->select("*")
                ->from("login")
                ->where("user" , $name )
                ->get()
                ->result();
       if(sizeof($query) >= 1){ return TRUE; }
       else { return FALSE; }
    }
    
    public function get_users(){
        $query = $this->db
                ->select("user")
                ->from("login")
                ->get()
                ->result_array();
        return $query;
    }

    public function _unistall() {
        
    }

    public function _widgets() {
        
    }

    public function _operations() {
        
    }

}
