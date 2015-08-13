<?php
/**
   @@author: Lieison S.A de C.V
   @@version: 1.5
 * @@type: plugin
 * @@name: Controlador de Shop unitee
 * @@description : controlador de la tienda unitee en web services con wp 
 * @@id : _user_001
 */

class TheUser extends CI_Controller {
    
    public  function __construct() {
        parent::__construct();
        $this->load->library("base_url");
    }
    
    public function exists(){
        $this->output->set_header("Access-Control-Allow-Origin: *");
        $this->load->model("user/user_profile");
        echo  $this->user_profile->exist_user($_REQUEST['name']);
 
    }
    
    public function Add(){
        
        if(!isset($_REQUEST['txt_nombre'])){
            redirect("/0/");
            return;
        }
        
        $nombre         = $_REQUEST['txt_nombre'];
        $apellido       = $_REQUEST['txt_apellido'];
        $correo         = $_REQUEST['txt_correo'];
        
        $user           = $_REQUEST['txt_user'];
        $pass           = $_REQUEST['txt_password'];
        
        $auto           = isset($_REQUEST['txt_generate']) ? $_REQUEST['txt_generate'] : NULL;
        
        if($auto != NULL){
            $this->load->helper("string");
            $pass = random_string();
        }
        
        
        $this->load->library('encryption');
        $this->load->helper("setup");
        
        $this->encryption->initialize(
        array(
                'cipher'    => 'aes-256',
                'mode'      => 'cbc',
                'key'       => get_key()
        ));
        
        $pass = $this->encryption->encrypt($pass);
        
        $date   = new DateTime("now");
        $current_d  = $date->format("Y-m-d H:m:s");
        
        $this->load->model("user/user_new");
        
        $id = $this->user_new
                ->CreateUser(array(
                    "user"          => $user,
                    "password"      => $pass,
                    "date"          => $current_d,
                    "last_date"     => $current_d,
                    "status"        => 1
                ));
        
        
        if(empty($id)){
            redirect("/0/user=user_new?e=1");
            return;
        }else{
             $p_ok = $this->user_new->CreatePerfil(array(
                    "id_login"                  => $id,
                    "nombres"                   => $nombre,
                    "apellidos"                 => $apellido,
                    "email"                     => $correo
             ));
             if($p_ok){
                   redirect("/0/user=user_edit?id=" . $id . "&rol=");
                   return;
             }else{
                   redirect("/0/user=user_new?e=1");
                   return;
             }
        }
  
    }
    
}
