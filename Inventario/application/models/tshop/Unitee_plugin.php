<?php


class Unitee_plugin extends CI_Model {
    
    
    var $query  = NULL;
    
    var $key    = "2330?¡?";
    
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_articulos($id){
        
        $this->query = "SELECT 
                        articulos.nombre as 'nombre',
                        articulos.descripcion as 'descripcion',
                        articulos.precio as 'precio',
                        color.nombre as 'color',
                        color.referencia as 'color_ref',
                        articulos.talla as 'tallas',
                        adjunto.adjunto as 'adjunto_data',
                        articulos.id_articulos as 'id_art',
                        art_variaciones.id_variacion as 'id_var'
                        FROM articulos 
                        INNER JOIN art_variaciones ON art_variaciones.id_articulo=articulos.id_articulos
                        LEFT JOIN color ON color.id_color=art_variaciones.id_color
                        LEFT JOIN adjunto ON adjunto.id_adjunto=art_variaciones.id_adjunto
                        WHERE articulos.id_articulos like ? ;";
        
        $result = $this->db
                ->query($this->query , $id)
                ->result_object();
        
      
        return $result;
        
    }
    
    public function get_non_articulos(){
        $this->query = "SELECT id_articulos as 'id' "
                . ", nombre as 'nombre' "
                . ", descripcion as 'descripcion' "
                . " FROM articulos WHERE status_shop LIKE 1";
         
        $result = $this->db
                ->query($this->query)
                ->result_object();
        
        return $result;
    }
    
    public function get_privatekey(){
        $this->load->library("metadata");
        $r = $this->metadata->GetMeta("plugin_key");
        return $r->value;
    }
    
    public function change_private_key(){
        
        $var = array( "A" , "B" , "C" , "D" , "E" , "F" , "G" , "@" , "%" , "&" , "?" , "!" , "¡");
        $this->load->helper("array");
        $plain = (sin(rand(2, 5)) * pi() ) + rand(200, 2000)  ;
        $plain = $plain  . random_element($var). random_element($var);
        $result =  md5($plain);
        $this->db->update("ws" , array("value" => $result) , array("item" => "key"));
        return $result;
    }
    
    
    
   
}
