<?php
/**
   @@author: Lieison S.A de C.V
   @@version: 1.5
 * @@type: system
 * @@name: Sistema de usuario
 * @@description : Controlador de los aspectos del usuario en sesion
 * @@id : system
 */


class User extends CI_Controller {
    
    protected $route = NULL;
    
    public function __construct() {
        parent::__construct();

        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
        $this->load->library("session");
        if(!is_array($this->session->user))
        {
            redirect("Login/");
            return;
        }
        
    }
    
    /**
     * @param string $type  (change , verify , )
     */
    public function Password($type , $redirect = NULL){
        
       
        $this->load->library("encryption");
        $this->load->helper("setup");
        
        $this->encryption->initialize(
        array(
                'cipher'    => 'aes-256',
                'mode'      => 'cbc',
                'key'       => get_key()
        ));
        
        switch ($type){
            case "change":
                
                $actual = $_REQUEST['txt_actual_pass'];
                $nueva  = $_REQUEST['txt_new_pass'];
                
                $actual_decrypt = $this->encryption
                        ->decrypt($this->session->user['password']);
                
                if(strcmp($actual_decrypt, $actual) != 0){
                    redirect("Dashboard/index/" . $redirect . "?opps=1");
                }
                
                $pass_encrypt = $this->encryption->encrypt($nueva);
                $this->load->model("user/user_profile");
                $success = $this->user_profile->change_password($pass_encrypt);
                if(!$success){
                     redirect("Dashboard/index/" . $redirect . "?opps=2");
                }
                else{
                     redirect("Dashboard/index/" . $redirect . "?opps=0");
                }
                break;
            case "verify":
                $this->load->model("user/user_auth");
                $state = $this->user_auth->PasswordState();
                echo $state;
                break;
        }
    }
    
    public function change_avatar(){
        
        /***
         * Funcion en la cual se encarga de cambiar al avatar 
         * se necesita las credenciales de sesion del usuario 
         * ***/
        
        
         //SE NECESITA ELEMENTO $_FILES VERIFICAR 
         if(!isset($_FILES['avatar_img']))
         {
             redirect("/0/");
             return;
         }
         
        //CONFIGURACION ESTANDAR  
         
        $path          = "./images/dashboard/users/";  //RUTA
        $name          = explode(".", $_FILES['avatar_img']['name']); //NOMBRE DE LA IMAGEN
        $ext           = end($name);  // EXTENSION DE LA IMAGEN
         
        $this->load->helper('string'); // HELPER STRING
        $rename =  random_string();  // CREAMOS UN NOMBRE ALEATORIO
           
        //CONFIGURAMOS EL FILE UPLOAD
        
        $config['upload_path']      = $path;  
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '1000';
        $config['file_name']        = $rename;
        
        //CONFIGURAMOS LAS LIBRERIAS
     
        $this->load->library('upload', $config); 
        $this->upload->do_upload("avatar_img"); //SUBIMOS LA IMAGEN
        $errors = $this->upload->display_errors(); // OBTENEMOS SI HAY ERROR 
        
        //VERIFICAMOS SI EXISTE UN ERROR  EN DADO CASO
        if($errors == NULL || $errors == ''){
            $this->load->model("user/user_profile");
            $is_ok = $this->user_profile->change_avatar($rename . "." . $ext);
            if($is_ok){
                
                $this->load->helper("file");
                $sesion = $this->session->user;
                
                if($sesion['avatar'] != NULL || $sesion['avatar'] != ""){
                    if(read_file($path .  $sesion['avatar'])){
                        unlink(FCPATH . "images/dashboard/users/" .  $sesion['avatar']);
                    }
                }
                
                $sesion['avatar'] =  $rename . "." . $ext;
                $this->session->set_userdata("user" , $sesion );
                redirect('/0/user=user_profile?opps=3');
            }else{
                 redirect('/0/user=user_profile?opps=4');
            }
        }else{
            redirect('/0/user=user_profile?opps=5');
        }
    }
    
    public function GetRoles(){
        
        $current_rol = $this->session->user['rol_nivel'];
        if($current_rol != 1 ){
            echo "No tiene suficientes privilegios";
            exit();
        }
        
    }
    
    public function exists($name = NULL){
        $this->load->model("user/user_profile");
        if($name != NULL){
            return $this->user_profile->exist_user($name);
        }else{
             echo $this->user_profile->exist_user($_REQUEST['name']);
        }
    }

    public function users(){
        $this->load->model("user/user_profile");
        $u      = $this->user_profile->get_users();
        $v      = isset($_REQUEST['js']) ? TRUE: FALSE;
        if($v) echo json_encode ($u);
        else return $v;
    }
    

    
}
