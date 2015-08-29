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

class view_producto extends CI_Model implements PInterface{
    
    use PluginConfig;
    
    protected $model   = "view_producto";

    var $route         = null;

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        
          $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Ver Producto",
                "description"   => "Modulo para editar producto",
                "id_model"      => "003",
                "id_update"     => "005",
                "update"        => "",
                "license"       => "",
                "controller"    => "",
                "view"          => "producto/producto_view"
        );
          
       $this->load->library("base_url");
       $this->route     = base_url();
        
    }
    
    public function _css() {
         return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css",
        );
    }

    public function _init() {
        $this->load->helper("form");
        
        $op = array(
            "operations" => $this->_operations()
        );
        
        $this->load->view("producto/producto_view" , $op);
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
        return array("table_loader();");
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
        return "Unitee | Ver productos";
        
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
    
    public function show_products(){
        $query = "SELECT
                  producto.id_producto as 'id' , 
                  producto.sku as 'sku',
                  producto.nombre as 'nombre' , 
                  color.nombre as 'color',
                  concat(producto.margen , ' ' , unidad.nombre ) as 'margen',
                  producto.cantidad as 'cantidad',
                  producto.descripcion as 'descripcion',
                  producto.precio as 'precio' ,
                  producto.precio_est_unidad as 'estimado'
                  FROM producto 
                  INNER JOIN color ON color.id_color=producto.id_color
                  INNER JOIN unidad ON unidad.id_unidad=producto.id_unidad
                  ORDER BY producto.date ASC; ";
        
        return $this->db
                ->query($query)
                ->result();
    }
    
    public function delete_product($id){
       return $this
               ->db
               ->delete("producto" , array("id_producto" => $id));
    }
    
        public function get_product($id){
        $this->query  = "SELECT  * from producto where id_producto LIKE  ?  ";
        
        return  $this->db
                ->query($this->query , array($id))
                ->result()[0];
    }

    public function _operations() {
        $this->load->model("system/permission_engine" , 'engine');
        $data = $this->engine->GetOperationRoles($this->model );
        return $data;
    }

}
   