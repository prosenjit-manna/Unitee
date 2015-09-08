<?php

/**
   @@author: Lieison S.A de C.V
   @@version: 1.5
 * @@type: plugin
 * @@name: Controlador de Shop unitee
 * @@description : controlador de la tienda unitee en web services con wp 
 * @@id : _web_services_001
 */

class NockupShop  extends CI_Controller{
    
    
    protected $key  = "LieisoftApi";

    public function encrypt($enc)
    {
         $this->load->library("encryption");
         echo "<br>";
         $data =  $this->encryption->encrypt($enc);
         echo $data;
         echo "<br>";
         echo $this->encryption->decrypt($data);
         
    }

    public function __construct() {
        parent::__construct();
        $this->load->model("tshop/Unitee_plugin" , "unitee");
        $this->key = $this->unitee->get_privatekey();
    }
    
    public function index(){
        echo "Nothing do here ....";
        return null;
    }
    
    
    
    public function NonArticulos($private_key , $c = null){
        
         //CREAMOS UN HEADER AL MOMENTO DE HACER EL WEB SERVICES
         $this->output->set_header("Access-Control-Allow-Origin: *");
         
         //SI LA LLAVE PRIVADA NO ES IGUAL ENTONCES SALU
         if(!$this->get_key($private_key)) return NULL;
         
          //OBTENEMOS LOS ARTICULOS 
          $r = $this->unitee
             ->get_non_articulos();
        
          print json_encode($r);
    }
    
    public function Articulos($private_key , $id_articulo  , $c = null){
        
        //CREAMOS UN HEADER AL MOMENTO DE HACER EL WEB SERVICES
        $this->output->set_header("Access-Control-Allow-Origin: *");
       
        //SI LA LLAVE PRIVADA NO ES IGUAL ENTONCES SALU
        if(!$this->get_key($private_key)) return NULL;
        
        //OBTENEMOS LOS ARTICULOS Y SUS VARIACIONES
        $r =  $this->unitee
             ->get_articulos($id_articulo);
        
       print json_encode($r);
        
    }
    
    public function GetImages($image , $c = NULL){
        $this->output->set_header("Access-Control-Allow-Origin: *");
        $this->load->library("base_url");
        print $this->base_url->GetBaseUrl("/images/articulos") . "/" . $image;
    }
    
    public function generate_key($old_key , $c = NULL){
           if(!$this->get_key($old_key)) return;
           print $this->unitee->change_private_key();
    }
    
    private function  get_key($private_key){
         if ($this->key != $private_key) {
            return false;
        }else{
            return true;
        }
    }
    
    
}
