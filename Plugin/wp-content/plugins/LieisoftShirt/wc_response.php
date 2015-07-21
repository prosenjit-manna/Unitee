<?php


require_once( $_REQUEST['path'] . "wp-config.php" );

global $current_user;
global $wpdb;




if(!function_exists("upload_base64")){
     
    function upload_base64($encode , $filename , $coord , $e ){
        
        $upload_dir             = wp_upload_dir();
        $upload_path            = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;
        $decoded                = base64_decode($encode);
        $hashed_filename        = md5($filename . microtime()) . '_' . $filename;
        

        
        header('Content-Type: image/png');
        
        $img = imagecreatefromstring($decoded);
        list($w , $h) = getimagesizefromstring($decoded);


        $w_m = 800;
        $h_m = 600;
        
        
        $wm = $h * ($w_m / $h_m);
        $hm = $w * ($h_m / $w_m);
        
        $i = imagecreatetruecolor($w_m, $h_m);
        
             
        imagealphablending($i , FALSE);
        imagesavealpha($i , TRUE);

        imagecopyresampled($i, 
                $img,
                0,
                0, 
                $coord->x,
                $coord->y ,
                $wm, 
                $hm , 
                $wm  , 
                $hm );

        imagepng($i, $upload_path . $hashed_filename );
        imagedestroy($img);
         
   
       // file_put_contents($upload_path . $hashed_filename, $decoded );

        if( !function_exists( 'wp_handle_sideload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php' );
        }
        if(!function_exists( 'wp_get_current_user' ) ) {
            require_once( ABSPATH . 'wp-includes/pluggable.php' );
        }

        if(!function_exists("wp_generate_attachment_metadata")){
            require_once  ( ABSPATH . 'wp-admin/includes/image.php' );
        }
         if(!function_exists("wp_get_image_editor")){
            require_once  ( ABSPATH . 'wp-includes/media.php' );
        }
         


        $file             = array();
        $file['error']    = '';
        $file['tmp_name'] = $upload_path . $hashed_filename;
        $file['name']     = $hashed_filename;
        $file['type']     = 'image/png';
        $file['size']     = filesize($upload_path . $hashed_filename );

        $file_            = wp_handle_sideload( $file, array( 'test_form' => false ) );
        
       

        $attachment = array(
                'post_mime_type'        => $file_['type'],
                'post_title'            => basename($filename),
                'post_content'          => '',
                'post_status'           => 'inherit'
        );

        $attach_id      = wp_insert_attachment( $attachment, $file_['file']);
        $attach_data    = wp_generate_attachment_metadata( $attach_id, $file_['file'] );
        
        wp_update_attachment_metadata( $attach_id,  $attach_data );
        
      //  $edit = wp_get_image_editor( $upload_path . $hashed_filename);
       // print_r($edit);
        
        return $attach_id;
        
    }

}



if($current_user->ID == NULL || empty($current_user->ID)){
    return null;
}


$user_id        = $current_user->ID;

$iformat        =  stripslashes($_REQUEST['images']);
$images         =  json_decode($iformat);

$camisas        = $_REQUEST['txt_camisas'];
$precio         = $_REQUEST['txt_precio'];
$duracion       = $_REQUEST['txt_duracion'];
$descripcion    = $_REQUEST['txt_descripcion'];
$tags           = $_REQUEST['txt_tags'];
$title          = $_REQUEST['titulo'];
$categoria      = $_REQUEST['camisas_cat'];
$coordF         = json_decode(stripslashes($_REQUEST['coordf']));
$coordB         = json_decode(stripslashes($_REQUEST['coordb']));

$images_id = array();

$post = array(
        'post_author'       => $user_id,
        'post_content'      => $descripcion,
        'post_status'       => "publish",
        'post_title'        => $title,
        'post_parent'       => '',
        'post_type'         => "product",
        'post_excerpt'      => "[ls_endtime]"
 );



$sku = "PROD" . floor(pi() * (int) $camisas * rand(100, 4000));

$post_id = wp_insert_post( $post, $wp_error );

wp_update_post(array(
    "ID"                => $post_id,
    'post_excerpt'      => "[ls_endtime id='$post_id']"
));

if($post_id){
     $attach_id = get_post_meta($product->parent_id, "_thumbnail_id", true);
     add_post_meta($post_id, '_thumbnail_id', $attach_id);
}
 
 
wp_set_object_terms( $post_id, $categoria, 'product_cat' );
wp_set_object_terms($post_id, explode(",", $tags), 'product_tag');


update_post_meta( $post_id, '_visibility', 'visible' );
update_post_meta( $post_id, '_stock_status', 'instock');


update_post_meta( $post_id, 'total_sales', '0');
update_post_meta( $post_id, '_downloadable', 'no');
update_post_meta( $post_id, '_virtual', 'no');


update_post_meta( $post_id, '_regular_price', $precio );
update_post_meta( $post_id, '_sale_price', "" );

update_post_meta( $post_id, '_purchase_note', "" );
update_post_meta( $post_id, '_featured', "no" );


update_post_meta( $post_id, '_weight', "" );
update_post_meta( $post_id, '_length', "" );
update_post_meta( $post_id, '_width', "" );
update_post_meta( $post_id, '_height', "" );


update_post_meta( $post_id, '_sku', $sku);

update_post_meta( $post_id, '_product_attributes', array());

update_post_meta( $post_id, '_sale_price_dates_from', "" );
update_post_meta( $post_id, '_sale_price_dates_to', "" );


update_post_meta( $post_id, '_price',  $precio );
update_post_meta( $post_id, '_sold_individually', "" );
update_post_meta( $post_id, '_manage_stock', "no" );

update_post_meta( $post_id, '_backorders', "no" );
update_post_meta( $post_id, '_stock', "" );

$n  = 0 ;
foreach ($images as $k=>$i){
    $co = $coordF;
    $e = FALSE;
    $base = explode(",", $i);
    $filename = $title . "_" . rand(0, 4000) . ".png";
    if($n == 1){
        $co = $coordB;
        $e = TRUE;
    }
    $images_id[] = upload_base64(end($base), $filename , $co , $e );
    $n++;
}

update_post_meta( $post_id, '_thumbnail_id', current($images_id) );
update_post_meta( $post_id, '_product_image_gallery' , implode("," , $images_id));


$date_ = new DateTime($duracion);

$ls_tshirt_db = array(
    "id_user"       => $user_id,
    "id_wc"         => $post_id,
    "camisa_obj"    => $camisas,
    "precio"        => $precio,
    "deadline"      => $date_->format("Y-m-d H:i:s"),
    "tags"          => $tags
);


$wpdb->insert("wp_shirt" , $ls_tshirt_db);

$guid = get_post_field("guid", $post_id );
echo $guid;
exit();