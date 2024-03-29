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

class New_producto extends CI_Model  implements PInterface {
    
    use PluginConfig;
    
    protected $route   = NULL;
    protected $model   = "new_producto";
    
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        
        $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Nuevo Producto",
                "description"   => "Modulo para nuevo producto",
                "id_model"      => "003",
                "id_update"     => "003",
                "update"        => "",
                "license"       => "",
                "controller"    => "",
                "view"          => "producto/producto_new"
        );
        
        
         $this->load->library("base_url");
         $this->route= base_url();
    }
    
    public function _css() {
         return array(
            $this->route . "assert/plugins/select2/select2.css"
        );
    }

    public function _init() {
        
        $this->load->helper("form");
        
        $this->load->view("producto/producto_new" , array(
            "dump" => $this->_Getconfig(),
            "sizes_dump" => $this->get_sizes()
         ));
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
        return array(
            $this->route . "assert/plugins/select2/select2.min.js"
        );
    }

    public function _jsLoader() {
         return array("load_colors();",
             "load_unidad();","generate_SKU();","validate_price();"
             ,"validate_cantidad();","validate_margen();");
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
        return "Unitee | Nuevo producto";
        
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
    
    
    public function get_sizes(){
       return $this->db->query("SELECT * FROM tallas")->result();
    }
    
    public function get_colors(){
   
      $this->query = "select id_color as 'id' ,  nombre as 'name' , referencia as 'ref' from color" ;
      return $this->db
                  ->query($this->query)
                  ->result();
       
    }
    
     public function get_unidad(){
   
      $this->query = "select id_unidad as 'id' ,  nombre as 'name' from unidad" ;
      return $this->db
                  ->query($this->query)
                  ->result();
       
    }
    
    
    public function generate_sku(){
   
      $this->query = "select id_producto as 'id' from producto
       ORDER BY  id DESC LIMIT 1 " ;
      return $this->db
                  ->query($this->query)
                  ->result();
       
    }
    
       public function new_product($nombre,$color ,$margen,$unidad , $sku ,$descripcion , $precio , $cantidad , $fab){
         
        $date   = new DateTime("now");
        $current_d  = $date->format("Y-m-d H:m:s");
        
        return $this->db->insert("producto" , array(
            "id_unidad"         => $unidad,
            "id_color"          => $color,
            "margen"            => $margen,
            "nombre"            => $nombre,
            "descripcion"       => $descripcion,
            "sku"               => $sku,
            "precio_est_unidad" => $precio,
            "cantidad"          => $cantidad,
            "date"              => $current_d,
            "fabricado"         => $fab
            
        ));
    }

    public function _widgets() {
        
    }

    public function _operations() {
        
    }

    public function _Dashboard() {
        
    }

    public function _JSdashboard() {
        
    }

}
   
