<?php

/**
  @@author: Lieison S.A de C.V
  @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de crear un nuevo usuario 
 * @@id : _producto_001
 */
get_instance()->load->interfaces("Interface");
get_instance()->load->interfaces("PluginConfig");

class Edit_cliente extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model        = "edit_cliente";
    
    var $route              = null;
    var $query              = null;
    

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->_config = array(
            "version" => 1.0,
            "author" => "Lieison S.A de C.V",
            "type" => "view",
            "name" => "Ver clientes",
            "description" => "Modulo para ver clientes",
            "id_model" => "003",
            "id_update" => "005",
            "update" => "",
            "license" => "",
            "controller" => "",
            "view" => "clientes/cliente_edit"
        );

        $this->load->library("base_url");
        $this->route = base_url();
    }

    public function _css() {
        return array(
            
        );
    }

    public function _init() {
        
      $this->load->helper(array("form" , "url"));
      
      $id = isset($_REQUEST['i'] ) ? $_REQUEST['i'] : NULL;
      
      if(is_null($id)){
          redirect("/0");
          return ;
      }
      
      $this->load->model("clientes/view_cliente" , "cliente");
      
      $info = $this
              ->cliente
              ->ShowClient($id);
      
      $this->load->view("clientes/cliente_edit" , array(
           "dc"    => $info[0]
      ));
      
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        return array(
               
        );
    }

    public function _jsLoader() {
      return array(
        "load_paises();",
         "LoadValidation();",
         "init_client();");
    }
    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, MODEL, INT
        );
        return $data;
    }

    public function _title() {
        return "Unitee | Editar clientes";
    }

    public function _update() {
        //ACTUALIZACION DEL MODULO UPDATE
    }

    public function _unistall() {
        //DESISTALACION 
    }

    public function _Getconfig() {
        return $this->_config;
    }

    public function _widgets() {
        
    }

    public function _operations() {
        $this->load->model("system/permission_engine", 'engine');
        $data = $this->engine->GetOperationRoles($this->model);
        return $data;
    }

    public function _Dashboard() {
        
    }

    public function _JSdashboard() {
        
    }
    
    public function EditAttach($id , $adj){
        $this->db
                ->where("id_adjunto" , $id);
        return $this
                ->db
                ->update("adjunto" , array("adjunto" => $adj));
    }
    
    public function EditClient(array $data , $id ){
         
         $this->db
                 ->where("id_cliente" , $id );
        
         return $this->db->update("cliente" , $data);
    }
    
   
    
}