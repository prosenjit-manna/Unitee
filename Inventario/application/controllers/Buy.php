<?php

class Buy extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        echo "Nothing do here ... :)";
    }

    public function SaveBuy() {

        $product = isset($_REQUEST['products']) ? json_decode($_REQUEST['products']) : NULL;

        if (is_null($product)) {
            echo FALSE;
            return;
        }

        $po         = isset($_REQUEST['po']) ? $_REQUEST['po'] : NULL;
        $fac        = isset($_REQUEST['fac']) ? $_REQUEST['fac'] : NULL;
        $total      = isset($_REQUEST['total']) ? $_REQUEST['total'] : NULL;
        $prov       = isset($_REQUEST['prov']) ? $_REQUEST['prov'] : NULL;
        $upload     = isset($_REQUEST['upload']) ? $_REQUEST['upload'] : NULL;

        $this->load->model("user/User_Auth", "user");
        $this->load->model("compra/new_compra", "buy");
        $this->load->model("productos/edit_producto", "prod");
        $this->load->helper("string");
        $this->load->library("tools");
        
        
        $id_upload = NULL;
        
        if(!is_null($upload) &&  $upload != "[]"){
             $this->load->model("tshop/Adjuntos" , "adj");
             $id_upload = $this->adj->Add($upload , "compras" , "Cod:" . random_string());
        }

        $this->tools->default_timezone();

        $id_user = $this->user->get_usr;

        $id_buy = $this->buy->Save(array(
            "id_proveedor"          => $prov,
            "precio_total"          => $total,
            "ref_factura"           => $fac,
            "PO"                    => $po,
            "id_adjunto"            => $id_upload,
            "id_user"               => $id_user,
            "date"                  => $this->tools->current_datetime()
        ));

        foreach ($product as $prod) {

            $this->prod->update_(
                    $prod->id, $prod->cant, $prod->price
            );

            $this->buy->SaveHistory($id_buy, $prod->id, $prod->cant, $prod->price);
        }
        
        

        echo TRUE;
    }

    public function SaveAttachment() {

        $this->load->helper(array('string', 'url', 'file', 'form'));

        $root       = 'files/unitee/compras/';
        $dir        = isset($_REQUEST['directory']) ? $_REQUEST['directory'] : NULL;
        $name       = random_string("md5");

        if (!is_null($dir)) {
            if (!file_exists(FCPATH . $root . $dir)) {
                if (!mkdir(FCPATH . $root . $dir, 0775)) {
                    $dir = "";
                }
            }
        }

        $this->load->library("base_upload");
        $this->base_upload->set_path("./" . $root . ($dir != '' ? $dir . "/" : ''));

        $this->base_upload->set_filename(array($name));
        $this->base_upload->Do_MultiUpload('files');

        
        $f                          = array();
        $f[0]['name']               = $_FILES['files']['name'];
        $f[0]['size']               = $_FILES['files']['size'];
        $f[0]['url']                = FCPATH  . $root . ($dir != '' ? $dir . "/" : '') . $name ;
        $f[0]['thumbnailUrl']       = FCPATH  . $root . ($dir != '' ? $dir . "/" : '') . $name  ;
        $f[0]['deleteUrl']          = NULL;
        $f[0]['deleteType']         = NULL;
        $f[0]['error']              = NULL;
        
        $f[0]['data']  = json_encode(array(
              "name"        => $_FILES['files']['name'],
              "document"    => $name,
              "directory"   => $dir
        ));

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('files' => $f)));
    }
    
    public function Data(){
        
        $option    = isset($_REQUEST['option']) ? $_REQUEST['option'] : 0;
        $value     = isset($_REQUEST['value']) ? $_REQUEST['value'] : NULL;
        $range     = isset($_REQUEST['range']) ? $_REQUEST['range'] : 0;
         
        $this->load->model("compra/view_compra" , "buy");

        $request = $this->buy->FindBuy(
             $range != 0 ? "range" : $option,
             $range != 0 ? $range  : $value
        );
         
        if(is_array($request)){
            $this->output
                    ->set_output(json_encode($request));
        }else{
            $this->output
                    ->set_output(0);
        }
         
    }

}
