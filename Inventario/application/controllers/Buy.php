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

        $this->load->model("compra/view_compra" , "buy");

        $request = $this->buy->Find(
             $option,
             $option != 5 ? $value : json_decode($value , TRUE)
        );
         
        if(is_array($request)){
            $this->output
                    ->set_output(json_encode($request));
        }else{
            $this->output
                    ->set_output(0);
        }
         
    }
    
    public function Download(){
        
        
        $name           = isset($_REQUEST['n']) ? $_REQUEST['n'] : NULL;
        $document       = isset($_REQUEST['doc']) ? $_REQUEST['doc'] : NULL;
        $dir            = isset($_REQUEST['d']) ? $_REQUEST['d'] : NULL;
        
        if(is_null($name)){
            return null;
        }
        
        $exp        = explode(".", $name);
        $ext        = end($exp);
        
        $this->load->helper("url");
        
        $uri    = base_url("files/unitee/compras/$dir/$document.$ext");
        
        header("Content-disposition: attachment; filename=$name");
        header("Content-type: application/octet-stream");
        readfile($uri);
        
    }
    
    public function Product(){
         $id    = isset($_REQUEST['i']) ? $_REQUEST['i'] : NULL;
         
         if(is_null($id)){
             $this->output->set_output('[]');
             return;
         }
         
         $this->load->model("productos/view_producto" , "prod");
         $result = $this->prod->GetByBuy($id);
         $this->output->set_output(json_encode($result));
         
    }
    
    public function Document(){
        
         $type = isset($_REQUEST['t']) ? $_REQUEST['t'] : "pdf";
         $id   = isset($_REQUEST['i']) ? $_REQUEST['i'] : NULL;  
         $d    = isset($_REQUEST['d']) ? $_REQUEST['d'] : NULL;
         
         $data  = json_decode($d);
         
         $this->load->helper("url");
         switch($type){
             case "pdf":
                 
                 $this->load->library("Pdf");
                 
                 /**********
                  * HEADER
                  * *********/

                $this->pdf->AddPage();
               
                 //$this->pdf->Cell(195,35,'',1,0,'C');
                 //$this->pdf->Cell(0,35,'HOLA',0,0,'C');
                 
                 
                 $this->pdf->Image(FCPATH .  "images/dashboard/logo_black.jpg" , 9 , 7 , 40);
                 $this->pdf->Line(0, 25, 225 , 25);
                 $this->pdf->SetFont('Times','B',14);
                 $this->pdf->Text(160, 10 , "Ref:");
                 $this->pdf->SetFont('Times','',14);
                 $this->pdf->Text(172, 10 , $data->factura);
                 $this->pdf->SetFont('Times','B',14);
                 $this->pdf->Text(160, 18 , "Fecha:");
                 $this->pdf->SetFont('Times','',14);
                 $date = new DateTime($data->fecha);
                 $this->pdf->Text(177,18 , $date->format("d/m/Y"));
                 
                 
                 
                 /***
                  * BODY
                  * ***/
             
                 $this->pdf->Rect(20,30,170,20);
                 
                 $this->pdf->SetFont('Times','B',12);
                 $this->pdf->Text(21, 37 , "Emitida Por: ");
                 $this->pdf->SetFont('Times','',12);
                 $this->pdf->Text(45, 37 , $data->user);
                 $this->pdf->SetFont('Times','B',12);
                 $this->pdf->Text(145, 37 , "PO: ");
                 $this->pdf->SetFont('Times','',12);
                 $this->pdf->Text(153, 37 , $data->po);
                 
                 
                 $this->pdf->SetFont('Times','B',12);
                 $this->pdf->Text(21, 45 , "Proveedor: ");
                 $this->pdf->SetFont('Times','',12);
                 $this->pdf->Text(45, 45 , $data->proveedor);
                 $this->pdf->SetFont('Times','B',12);
                 $this->pdf->Text(145, 45 , "Total: ");
                 $this->pdf->SetFont('Times','',12);
                 $this->pdf->Text(158, 45, "$" . $data->total);
                 
                 
                 /**
                  * TABLE 
                  * **/

                  $this->load->model("productos/view_producto" , "prod");
                  
                  $result       = $this->prod->GetByBuy($id);

             
                  
                  $header = array(
                      "Producto ",
                      "Cantidad ",
                      "Precio ",
                      "Color "
                  );
                  
                 
                 $this->pdf->Rect(20,55,170,200);
                 
                 $this->pdf->SetFont('Times','B',12);
                 
                 $y     = 60;
                 $x     = 21;
                 
                 for($i=0 ; $i < count($header) ; $i++){
                      $this->pdf->Text($x, $y , $header[$i]);
                      if($i== 0){
                           $x = $x+80;
                      }else{
                           $x = $x+30;
                      }
                 }
                 $this->pdf->Line(20, 62, 190 , 62);
                 
                 $this->pdf->SetFont('Times','',12);
                 
                 $y         = 62;
                 $x         = 21;
                 $flag      = FALSE;
                 foreach($result as $v){
                     $y = $y+6;
                     
                     if($y >= 240 && $flag == FALSE){
                         $this->pdf->AddPage();
                         $flag = TRUE;
                         $y = 10;
                     }
                     
                     $this->pdf->Text($x , $y , $v->nombre );
                     $x = $x+80;
                     $this->pdf->Text($x , $y , $v->cantidad);
                     $x = $x+30;
                     $this->pdf->Text($x , $y , "$" . $v->precio);
                     $x = $x+30;
                     $this->pdf->Text($x , $y ,  $v->color);
                     $x=21;
                 }
             
                 
                 $this->pdf->Output();
                 
                 break;
             case "excel":
                 break;
         }
    }

    public function Delete(){
        
           //CARGANDO LOS MODELS NECESARIOS 
         $this->load->model("user/user_auth" , "auth");
         $this->load->model("compra/view_compra" , "compra");
         
         /**
          * SISTEMA DE SEGURIDAD 
          * VERIFICAMOS SI EL USAURIO ESTA LOGUEADO ADEMAS 
          * VERIFICAREMOS LOS PERMISOS DENTRO DE _rols()
          * LUEGO DE ESO VERIFICAMOS SI SU PERMISO ES GRANTED
          * EN DADO CASO SE DIO PERMISO LA BANDERA CAMBIA A CIERTO
          * ****/
         
         $auth              = isset($this->auth->get_auth['rol_nivel']) 
                                    ? $this->auth->get_auth['rol_nivel'] : NULL;
         $current_rols      = $this->compra->_rols();
         $flag              = FALSE;
         
         foreach ($current_rols as $r){
             if($r == $auth){
                 $flag = TRUE;
                 break;
             }
         }
         
        
         if(!$flag){
             $this->output->set_output(false);
             return;
         }
         
         //FIN DE SEGURIDAD 
        
        
        $this->load->library("session");
        
        if(!is_array($this->session->user)){
            $this->output->set_output(FALSE);
            RETURN;
        }
        
        $i = isset($_REQUEST['i']) ? $_REQUEST['i']  : 0;
        
        if($i == 0){
            $this->output->set_output(FALSE);
            RETURN;
        }
        
        $this->load->model("compra/view_compra" , "buy");
        $this->buy->Delete($i);
        
        $this->output->set_output(TRUE);
        
    }

}
