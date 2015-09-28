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

class View_cliente extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model        = "view_cliente";
    
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
            "view" => "clientes/cliente_view"
        );

        $this->load->library("base_url");
        $this->route = base_url();
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"   
        );
    }

    public function _init() {
      $this->load->helper("form");
      $this->load->view("clientes/cliente_view" , array(
           "data_client"        => $this->GetTableClient(),
           "operations"          => $this->_operations()
      ));
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        return array(
                $this->route . "assert/plugins/select2/select2.min.js",
                $this->route . "assert/plugins/datatables/media/js/jquery.dataTables.js",
                $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js",
                $this->route . "assert/system/table-managed.js"
        );
    }

    public function _jsLoader() {
      return array("table_loader();","TableEditable.init();");
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, MODEL, INT
        );
        return $data;
    }

    public function _title() {
        return "Unitee | Ver clientes";
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
    
    private function GetTableClient(){
         $this->query = "SELECT 
                            cliente.id_cliente as 'id',
                            cliente.nombre as 'nombre',
                            cliente.tipo as 'tipo',
                            concat(contacto.nombre , '/' , contacto.tel1) as 'contacto',
                            contacto.correo as 'email'
                            FROM cliente 
                            INNER JOIN contacto ON contacto.id_contacto=cliente.id_contacto;";
         $result = $this->db
                 ->query($this->query)
                 ->result();
         
         return is_array($result) ? $result : NULL;
    }
    
    public function Delete($id){
        
         
        
         $result = $this->db->query(
                 "SELECT id_adjunto as 'adjunto' FROM cliente WHERE id_cliente LIKE ?" ,
                 array($id));
         print_r($result);
    }
    
}