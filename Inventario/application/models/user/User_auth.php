<?php



class User_Auth extends CI_Model {
    
    
    var $get_auth       = array();
    
    var $get_id         = NULL;
    
    var $get_usr        = NULL;
    
    var $roles          = array();
    
    protected $query    = NULL;
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->library('session');
        
        if(is_array($this->session->user)){
            $user = $this->session->user;
            $this->get_id       = $user['id_login'];
            $this->get_usr      = $user['id_user'];
            $this->get_auth     = $user;
            $this->roles        = array(
                "name"          => $user['rol_name'],
                "nivel"         => $user['rol_nivel'],
                "sub_nivel"     => $user['sub_nivel'],
                "parent"        => $user['parent']
            );
        }
    }
    
    public function Auth($usr , $pwd , $type = "user"){
        
        
        $this->load->library('encryption');
        
        
        //iniciando tipo de encriptacion aes-256
        // se tiene la llave por medio de helper setup
        $this->encryption->initialize(
        array(
                'cipher'    => 'aes-256',
                'mode'      => 'cbc',
                'key'       => get_key()
        ));
        
        
        // comenzaremos analizar el campo de user en la tabla login
        $t = "login.user";
        
        //verifica si el tipo es email
        if($type === "email"){
            $t = "user.email";
        }

        $this->query = NULL;
        
        //sentencia sql en el cual verifica el estado de un usuario
        $this->query = "SELECT concat(user.nombres, ' ' , user.apellidos ) "
                     . " as 'name' , login.user as 'user' "
                     . ", login.password as 'password' "
                     . ", login.status as 'status' "
                     . ", login.last_date as 'last_date' "
                     . ", login.password_state as 'p_state'"
                     . ", roles.nombre as 'rol_name' "
                     . ", roles.nivel as 'rol_nivel'  "
                     . ", roles.parent as 'parent'"
                     . ", user.avatar as 'avatar' "
                     . ", roles.sub_nivel as 'sub_nivel'  "
                     . ", user.email as 'email' "
                     . ", login.id_login as 'id_login'"
                     . ", user.id_user as 'id_user' "
                     . " FROM user "
                     . " LEFT JOIN login ON login.id_login=user.id_login "
                     . " LEFT JOIN roles ON roles.id_rol=user.id_rol "
                     . " WHERE $t LIKE ? ";
        
        $request = $this->db
                        ->query($this->query , array(
                            $usr 
                        ))
                        ->result_array()[0];
       
        
        if(empty($request))
        {
            return FALSE;
        }
        else
        {
            $pass = $this->encryption->decrypt($request['password']);
            if(strcmp($pwd, $pass) !== 0){
                return FALSE;
            }
        }
        
        if($request['status'] == 0){
            return array(
                "status"    => 0,
                "user"      => $request['user'],
                "avatar"    => $request['avatar'],
                "name"      => $request['name']
            );
        }
        
        
        if(isset($this->session->user))
        {
            
            $this->session->unset_userdata('user');
        }
        
        $this->session->user = $request;
        
         
        date_default_timezone_set("America/El_Salvador");
        
        $date   = new DateTime("now");
        $current_d  = $date->format("Y-m-d H:m:s");
        $this->db->update("login" ,
                    array("last_date" => $current_d ) ,
                    "id_login = " . $request['id_login']
        );
        
        return TRUE;

       
    }
    
    
    public function PasswordState(){
        $r = $this->db->query("select password_state as "
                . "'state' FROM login WHERE id_login LIKE " 
                . $this->get_id)->result()[0];
        return $r->state;
    }
   
}
