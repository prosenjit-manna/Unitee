<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.2
 * @@update : lieison.com/unitee/update
 * @@type: plugin
 * @@name: nuevo usuario
 * @@parent: user
 * @@description : modulo en el cual se encarga de crear un nuevo usuario 
 * @@id : _provider_001
 */


get_instance()->load->interfaces("Interface");
get_instance()->load->interfaces("PluginConfig");

class View_proveedor extends CI_Model implements PInterface{
    
    use PluginConfig;
    
    protected $model   = "view_proveedor";

    var $route         = null;

    protected $query   = NULL;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("base_url");
        
          $this->_config = array(
                "version"       => 1.0,
                "author"        => "Lieison S.A de C.V",
                "type"          => "plugin",
                "name"          => "Ver Proveedor",
                "description"   => "Modulo ver proveedores",
                "id_model"      => "001",
                "id_update"     => "004",
                "update"        => "",
                "license"       => "",
                "controller"    => "",
                "view"          => "producto/producto_new"
        );
    }
    
    public function _css() {
         return array(
            $this->route . "assert/plugins/select2/select2.css",
            $this->route . "assert/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"
        );
    }

    public function _init() {
        
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library("pagination");
        
        //CONFIGURACION DE LA PAGINACION DE DATOS 
        
        $count_                         = $this->get_count_providers();
        
        $config["base_url"]             = base_url() . "/0/proveedor=view_proveedor";
        $config["total_rows"]           = $count_;
        $config["per_page"]             = 5;
        $config["uri_segment"]          = 3;
        $config['page_query_string']    = TRUE;
        $config['prev_link']            = '&lt;';
        $config['prev_tag_open']        = '<li>';
        $config['prev_tag_close']       = '</li>';
        $config['next_link']            = '&gt;';
        $config['next_tag_open']        = '<li>';
        $config['next_tag_close']       = '</li>';
        $config['full_tag_open']        = '<center><nav><ul class="pagination">';
        $config['num_tag_open']         ='<li>';
        $config['num_tag_close']        = '</li>';
        $config['cur_tag_open']         ='<li><a>';
        $config['cur_tag_close']        = '</li></a>';
        $config['full_tag_close']       = '</ul></nav></center';
        $config['last_link']            = 'Ultimo';
        $config['last_tag_open']        = "<li>";
        $config['last_tag_close']        = "</li>";
        $config['first_link']            = 'Primero';
        $config['first_tag_open']        = "<li>";
        $config['first_tag_close']        = "</li>";

        $this->pagination->initialize($config);
        
        $page = isset($_REQUEST['per_page']) ? $_REQUEST['per_page'] : 0;
        
        
        $data = array(
           "links"          => $this->pagination->create_links(),
           "data"           => $this->get_limit_providers( $config["per_page"] , $page),
        );
        
        $this->load->view("proveedor/proveedor_view" , $data);
    }

    public function _install() {
        //INSTALACION DEL MODULO 
    }

    public function _js() {
          //AQUI VAN ÑLOS JAVASCRIPT
    }

    public function _jsLoader() {
        return array("load_paises();");
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
        return "Unitee | Ver Proveedor";
        
    }

    public function _update() {
        //ACTUALIZACION DEL MODULO UPDATE
    }


    public function _unistall() {
        //DESISTALACION 
    }
    
    public function view(){
        
    }
    
    private function get_limit_providers($limit , $start){
        
        $this->query = "SELECT proveedor.id_proveedor as 'id_prov' , 
                 proveedor.codigo as 'codigo' , 
                 proveedor.nombre as 'empresa' ,
                 depto_pais.nombre as 'departamento',
                 contacto.nombre as 'contacto' ,
                 concat(contacto.tel1 , '/' , contacto.tel2 ) as 'telefono' ,
                 proveedor.descripcion as 'descripcion'  FROM proveedor 
                 INNER JOIN direccion ON direccion.id_direccion=proveedor.id_direccion
                 INNER JOIN depto_pais ON depto_pais.id_depto_pais=direccion.depto
                 INNER JOIN contacto ON contacto.id_contacto=proveedor.id_contacto
                 ORDER BY proveedor.fecha Desc limit $start , $limit;";
        
        return $this->db
                ->query($this->query)
                ->result();
        
    }
    
    private function get_count_providers(){
        return $this->db->query("SELECT count(*) as 'count' FROM proveedor")
                ->result()[0]->count;
    }
    
    public function get_provider($id){
        $this->query  = "SELECT proveedor.id_proveedor as 'id_prov' , 
                 proveedor.codigo as 'codigo' , 
                 proveedor.nombre as 'empresa' ,
                 proveedor.descripcion as 'descripcion',
                 proveedor.id_direccion,
                 proveedor.id_contacto ,
                 proveedor.fecha as 'fecha',
                 direccion.dir1 as 'dir1',
                 direccion.dir2 as 'dir2',
                 direccion.local as 'local',
                 paises.iso as 'pais_iso',
                 paises.nombre as 'pais_nombre',
                 depto_pais.codigo_depto_pais as 'depto_codigo',
                 depto_pais.nombre as 'depto_nombre',
                 municipio_depto.codigo_municipio_depto as 'municipio_codigo',
                 municipio_depto.nombre as 'municipio_nombre',
                 contacto.tel1 as 'contacto_tel1',
                 contacto.tel2 as 'contacto_tel2',
                 contacto.fax as 'contacto_fax',
                 contacto.correo as 'contacto_correo',
                 contacto.nombre as 'contacto_nombre'
                 FROM proveedor 
                 INNER JOIN direccion ON direccion.id_direccion=proveedor.id_direccion
                 INNER JOIN paises ON paises.iso=direccion.pais
                 INNER JOIN depto_pais ON depto_pais.id_depto_pais=direccion.depto
                 INNER JOIN municipio_depto ON municipio_depto.codigo_municipio_depto=direccion.ciudad
                 INNER JOIN contacto ON contacto.id_contacto=proveedor.id_contacto
                 WHERE id_proveedor LIKE ?
                 ";
        
        return  $this->db
                ->query($this->query , array($id))
                ->result()[0];
    }
    
    public function del_provider($id){
        
        $data                = $this->get_provider($id);
        $id_adress           = $data->id_direccion;
        $id_contact          = $data->id_contacto;
        
        $this->db->delete("proveedor" , array("id_proveedor" => $id));
        $this->db->delete("direccion" , array("id_direccion" => $id_adress));
        $this->db->delete("contacto" , array("id_contacto" => $id_contact));
    }

    public function _Getconfig() {
        return $this->_config;
    }

    public function _widgets() {
        
    }

    public function _operations() {
        
    }

}
