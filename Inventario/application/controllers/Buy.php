<?php

class Buy extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
        echo "Nothing do here ... :)";
    }
    
    public function SaveBuy(){
        
        $product    = isset($_REQUEST['products']) ? $_REQUEST['products'] : NULL;
        
        if (is_null($product)) {
            echo FALSE;
        }
        
        $po         = isset($_REQUEST['po']) ? $_REQUEST['po'] : NULL;
        $fac        = isset($_REQUEST['fac']) ? $_REQUEST['fac'] : NULL;
        $total      = isset($_REQUEST['total']) ? $_REQUEST['total'] : NULL;
        
        $product    = json_decode($product);
        
        foreach($product as $prod ){
            
        }
        
    }
    
    public  function SaveAttachment(){
        
    }
  
}
