<?php

/**
 * @@ Type : system
 * @@ version : 1.0
 * @@ name : User
 * @@ company: Lieison
 */


class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->library("base_url");
        
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
    
}
