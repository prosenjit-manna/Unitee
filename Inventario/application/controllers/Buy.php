<?php

class Buy extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        echo "Nothing do here ... :)";
    }
    
    public function SaveBuy(){
        
        $product    = isset($_REQUEST['products']) ? json_decode($_REQUEST['products']) : NULL;
        
        if (is_null($product)) {
            echo FALSE;
        }
        
        $po         = isset($_REQUEST['po']) ? $_REQUEST['po'] : NULL;
        $fac        = isset($_REQUEST['fac']) ? $_REQUEST['fac'] : NULL;
        $total      = isset($_REQUEST['total']) ? $_REQUEST['total'] : NULL;
        $prov       = isset($_REQUEST['prov']) ? $_REQUEST['prov'] : NULL;
        $adjunto    = isset($_REQUEST['adjunto']) ? $_REQUEST['adjunto'] : NULL;
        
        
        $this->load->model("user/User_Auth" , "user");
        $this->load->model("compra/new_compra" , "buy");
        $this->load->model("productos/edit_producto" , "prod");
        $this->load->library("tools");
        
        $this->tools->default_timezone();
        
        $id_user            = $this->user->get_usr;
        
        $id_buy             = $this->buy->Save(array(
               "id_proveedor"           => $prov,
               "precio_total"           => $total,
               "ref_factura"            => $fac,
               "PO"                     => $po,
               "id_adjunto"             => $adjunto,
               "id_user"                => $id_user,
               "date"                   => $this->tools->current_datetime()
        ));
        
        foreach($product as $prod ){
            
            $this->prod->update_(
                     $prod->id , 
                     $prod->cant ,
                     $prod->price 
             );
           
             $this->buy->SaveHistory($id_buy , $prod->id);
        }
        
        echo TRUE;
        
    }
    
    public  function SaveAttachment(){
        
    }
  
}
