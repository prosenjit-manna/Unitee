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

class View_proveedor extends CI_Model implements PInterface{
    
    
    protected $model   = "view_proveedor";

    protected $query   = NULL;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("base_url");
    }
    
    public function _css() {
        //ACA IRAN TODOS LOS CSS 
    }

    public function _init() {
        
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library("pagination");
        
        //CONFIGURACION DE LA PAGINACION DE DATOS 
        
        $count_                         = $this->get_count_providers();
        
        $config["base_url"]             = base_url() . "/0/proveedor=view_proveedor";
        $config["total_rows"]           = $count_;
        $config["per_page"]             = 6;
        $config["uri_segment"]          = 3;
        $config['page_query_string']    = TRUE;
        $config['prev_link']            = '&lt; Anterior &nbsp;&nbsp;';
        $config['prev_tag_open']        = '';
        $config['prev_tag_close']       = '';
        $config['next_link']            = '&nbsp;&nbsp; Siguiente &gt;';
        $config['next_tag_open']        = '';
        $config['next_tag_close']       = '';
        

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
        //ACA IRAN TODOS LOS JAVASCRIPT
    }

    public function _jsLoader() {
        return array("load_paises();");
    }

    public function _rols() {
        
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
                 ORDER BY proveedor.nombre ASC limit $start , $limit;";
        
        return $this->db
                ->query($this->query)
                ->result();
        
    }
    
    private function get_count_providers(){
        return $this->db->query("SELECT count(*) as 'count' FROM proveedor")
                ->result()[0]->count;
    }
    

}
