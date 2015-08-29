<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: Editar Usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de editar un usuario 
 * @@id : _user_001
 */

get_instance()->load->interfaces("Interface");

class User_edit extends CI_Model implements PInterface{

    var $route = NULL;
    
    protected  $model = "user_edit";

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("base_url");
        $this->route = $this->base_url->GetBaseUrl();
    }

    public function _css() {
         return array(
           $this->route . "assert/plugins/bootstrap-toastr/toastr.min.css",
           $this->route . "assert/perfil/css/profile.css",
           $this->route . "assert/perfil/css/profile-old.css",
           $this->route . "assert/plugins/icheck/skins.css"
       );
    }

    public function _init() {
        $this->load->helper("form");
        $this->load->view("usuario/edit");
    }

    public function _install() {

    }

    public function _js() {
         return array(
            $this->route . "assert/plugins/bootstrap-toastr/toastr.min.js",
            $this->route . "assert/plugins/bootstrap-toastr/ui-toastr.js",
            $this->route . "assert/plugins/icheck/icheck.js"
       );
    }

    public function _jsLoader() {
          return array( "i();" , "c();" , "p();");
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
        return "Unitee | Editar Usuario";

    }

    public function _update() {

    }

    public function _unistall() {
        
    }
    
    public function GetUsersInfo($id){
        $this->query = "SELECT"
                . " login.user ,"
                . " login.status , "
                . " login.password_state,"
                . " login.last_date,"
                . " user.nombres ,"
                . " user.apellidos ,"
                . " user.email ,"
                . " user.id_user,"
                . " user.id_rol,"
                . " roles.nivel as 'rol_nivel',"
                . " user.id_login "
                . " FROM login "
                . " LEFT JOIN user ON user.id_login=login.id_login "
                . " LEFT JOIN roles ON roles.id_rol=user.id_rol"
                . " WHERE login.id_login LIKE ?";
        return $this->db
                ->query($this->query , array($id))
                ->result_array();
        
    }
    
    public function GetUsers(){
        $this->query = "SELECT login.id_login ,  login.user FROM login ";
        return $this->db
                ->query($this->query)
                ->result_array(); 
    }
    
    public function updateUsers($table , array $values , $condition){
        return $this->db->update($table , $values , $condition);
    }
    
    public function get_roles($nivel){
        return $this->db
                ->query("select id_rol from roles WHERE nivel like $nivel")
                ->result()[0];
    }

    public function _widgets() {
        
    }

    public function _operations() {
        
    }

}
