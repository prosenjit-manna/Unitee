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

class New_articulopre extends CI_Model implements PInterface {

    use PluginConfig;

    protected $model        = "new_articulopre";
    
    
    var $route              = null;
    var $path               = "";

    public function __construct() {
        parent::__construct();

        $this->load->database();

        $this->_config = array(
            "version"               => 1.0,
            "author"                => "Lieison S.A de C.V",
            "type"                  => "view",
            "name"                  => "Ver clientes",
            "description"           => "Modulo para crear clientes",
            "id_model"              => "003",
            "id_update"             => "005",
            "update"                => "",
            "license"               => "",
            "controller"            => "",
            "view"                  => "articulos/articulos_newpre"
        );

        $this->load->library("base_url");
        $this->route = base_url();
    }

    public function _css() {
        return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css",
            $this->route . "assert/perfil/css/profile.css",
            $this->route . "assert/perfil/css/profile-old.css",
            $this->route . "assert/perfil/css/bootstrap-fileinput.css",
            $this->route . "assert/plugins/select2/select2.css"
        );

    }

    public function _init() {
        
        $this->load->helper("form");
        
        $this->load->view("articulos/articulo_newpre" , array(
              "articles"    => $this->GetArticle()
        ));
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
       return array(
            $this->route . "assert/plugins/select2/select2.min.js",
            $this->route . "assert/plugins/datatables/media/js/jquery.dataTables.min.js",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js",
            $this->route . "assert/plugins/table-editable.js",
            $this->route . "assert/perfil/js/profile.js",
            $this->route . "assert/perfil/js/bootstrap-fileinput.js",
            $this->route . "assert/plugins/select2/select2.min.js"
        );
    }

    public function _jsLoader() {
         return array("_load();"  );
    }

    public function _rols() {
        $this->load->model("system/permission_engine");
        $data = $this->permission_engine->_get(
                $this->model, MODEL, INT
        );
        return $data;
    }

    public function _title() {
        return "Unitee | Nuevo Articulo";
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
    
    public function GetArticle(){
        
         $this->load->model("productos/view_producto" , "prod");
         return $this->prod->get_products(1);
    }
    
    public function GetSize($request)
    {
         $data = $request['data'];
         $this->load->model("productos/view_producto" , "prod");
         $result = $this->prod->get_sizes_art("name" , $data);
         return json_encode($result);
    }
    
    public function GetInfo($request)
    {
        $data = $request['data'];
        
        return json_encode($this->db->query("SELECT 
                                                sum(producto.cantidad) as 'cantidad',
                                                min(producto.precio) as 'min',
                                                max(producto.precio) as 'max',
                                                producto.precio_est_unidad as 'estimado'
                                                FROM producto WHERE producto.nombre LIKE '%$data';"
               
                )->result()[0]
             );
        
    }
    
}