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
        $this->load->library("session");
        if(!is_array($this->session->user))
        {
            redirect("Login/");
            return;
        }
        
    }
    
    public function index(){ echo "Un pajarito se perdio";}
    
    public function GetUserInfo($i = NULL){
        $id = isset($_REQUEST['data']) ? $_REQUEST['data'] : $i;
        $this->load->model("user/user_edit");
        $result = $this->user_edit->GetUsersInfo($id);
        if($i == NULL){
            echo json_encode($result);
        }else{
             return $result;
        }
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
        
        $the_pass = $pass;
        
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
                    $this->load->helper("setup");
                    $this->load->library("email");
                   
                    if(email_config() != NULL){
                        $this->email->initialize(email_config());
                    }
        
                    $from_      = email_from();
                    
                    $this->email->from($from_['from'], $from_['name']);
                    $this->email->to($correo);

                    $this->email->subject('Contraseña Unitee | Inventario');
                    
                    $message_ = '<br> Tu Usuario es : ' 
                            . $user . '<br>' 
                            . 'Tu contraseña es : ' 
                            . $the_pass;
                    
                    $this->email->message($message_);

                    $this->email->send();
                    
                    redirect("/0/user=user_edit?id=" . $id . "&rol=");
                   return;
             }else{
                   redirect("/0/user=user_new?e=1");
                   return;
             }
        }
  
    }
    
    public function Edit(){
        
        
        
         if(!isset($_REQUEST['txt_nombres'])){
            redirect("/0/");
            return;
        }
        
        $nombre         = $_REQUEST['txt_nombres'];
        $apellido       = $_REQUEST['txt_apellidos'];
        $correo         = $_REQUEST['txt_email'];
        
        $pass           = isset($_REQUEST['txt_pass']) ? $_REQUEST['txt_pass'] : NULL;
        $status         = isset($_REQUEST['txt_baja']) ? $_REQUEST['txt_baja'] : NULL;
        
        $id             = $_REQUEST['id_user'];
        
        echo $id;
        
        $data_login     = array();
        $data_user      = array(
            "nombres"           => $nombre,
            "apellidos"         => $apellido,
            "email"             => $correo
        );
        
        if($status != NULL){
            $data_login["status"] = $status; 
        }
        
        if($pass != NULL){
             $this->load->helper("string");
             $this->load->library("encryption");
             $this->load->helper("setup");
             
             $random  = random_string();
             
             $this->encryption->initialize(
              array(
                        'cipher'    => 'aes-256',
                        'mode'      => 'cbc',
                        'key'       => get_key()
               ));
             
             
              
             $data_login['password']            = $this->encryption->encrypt($random);
             $data_login['password_state']      = 0;
             
             
                         
                    $this->load->library("email");
                   
                    if(email_config() != NULL){
                        $this->email->initialize(email_config());
                    }
        
                    $from_      = email_from();
                    
                    $this->email->from($from_['from'], $from_['name']);
                    $this->email->to($correo);

                    $this->email->subject('Contraseña Unitee | Inventario');
                    
                    $message_ =
                             'Tu nueva contraseña es : ' 
                            . $random;
                    
                    $this->email->message($message_);

                    $this->email->send();
             
        }
        
        $this->load->model("user/user_edit");
       
        
        if(count($data_login) >= 1){
            $r  = $this->user_edit->updateUsers("login" , $data_login , "id_login=$id");

            
            if(!$r){
                redirect("/0/user=user_edit?e=3&id=" . $id );
                return;
            }
        }
        
        $e  = $this->user_edit->updateUsers("user" , $data_user, "id_login=$id");
        if($e){
             redirect("/0/user=user_edit?e=0&id=" . $id );
             return;
        }else{
             redirect("/0/user=user_edit?e=3&id=" . $id );
             return;
        }
    }
    
}
