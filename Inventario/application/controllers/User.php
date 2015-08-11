<?php

/**
 * @@ Type : system
 * @@ version : 1.0
 * @@ name : User
 * @@ company: Lieison
 */


class User extends CI_Controller {
    
    protected $route = NULL;
    
    


    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
        if(!is_array($this->session->user))
        {
            redirect("Login/");
            return;
        }
        
    }
    
    /**
     * @param string $type  (change , verify , )
     */
    public function Password($type , $redirect){
        
       
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
                break;
        }
    }
    
    public function change_avatar(){
        
         if(!isset($_FILES['avatar_img']))
         {
             redirect("/0/");
             return;
         }
         
         
        $path          = "./images/dashboard/users/";
        $name          = explode(".", $_FILES['avatar_img']['name']);
        $ext           = end($name);  
         
        $this->load->helper('string');
        $rename =  random_string();
           
        $config['upload_path']      = $path;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = '1000';
        $config['file_name']        = $rename;
        
     
        $this->load->library('upload', $config);
        $this->upload->do_upload("avatar_img");
        
        $errors = $this->upload->display_errors();
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
    
}
