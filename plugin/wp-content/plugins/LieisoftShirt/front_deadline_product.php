

<?php

global $wpdb;

$query      = "SELECT deadline FROM wp_shirt WHERE id_wc LIKE $id";
$resultset  = $wpdb->get_results($query); 
$resultset  = $resultset[0];

$stock      = get_post_meta($id, "_stock_status");
$date_      = new DateTime($resultset->deadline);
$now_       = new DateTime("NOW");
$in_        = $date_->diff($now_);
$s          = FALSE;

if($now_ > $date_ ){
    if($stock != "outofstock"){
        $stock = $stock[0];
        update_post_meta($id, "_stock_status", "outofstock");
    }
    $s = TRUE;
}


if(!function_exists("custom_get_availability")){
      
    function custom_get_availability( $availability, $_product ) {
        if ( $_product->is_in_stock() ) $availability['availability'] = __(get_option("ls_stock_"), 'woocommerce');
  
        if ( !$_product->is_in_stock() ) $availability['availability'] = __(get_option("ls_outstock_"), 'woocommerce');
        return $availability;
    }

}

add_filter( 'woocommerce_get_availability', 'custom_get_availability', 1, 2);
        

?>
<input type="hidden" id="count_ls" value="<?php echo $resultset->deadline; ?>" />
<input type="hidden" id="page_ls" value="<?php echo get_page_link(); ?>" />

<?php if(!$s) : ?>
<style>
    .count_down {
        width: 322px;
        height: 44px;

        border: 4px rgb(172, 14, 14) solid;

        padding: 1px;

        margin: 1px;

        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=72)";
        filter: alpha(opacity=72);
        -moz-opacity: 0.72;
        -khtml-opacity: 0.72;
        opacity: 0.72;

        -webkit-box-sizing: inherit;
        -moz-box-sizing: inherit;
        box-sizing: inherit;

        font-size: 20px;
        text-decoration: blink;
        text-align: center;

        line-height: 1.6em;

    }
</style>
<br>
<div class="count_down" id="getting-started"></div>   
<br>
<?php else: ?>
    <div><p><b><?php echo get_option("ls_campain_"); ?></b></p></div>
<?php endif; ?>

<script type="text/javascript">
    
    jQuery(document).ready(function($){
          $("#getting-started").countdown($("#count_ls").val() , function(event) 
          {
                $(this).text(event.strftime('%D dias  %H:%M:%S Horas'));
          }).on('finish.countdown', function(){
                window.location.href = $("#page_ls").val();
          });
    });

 </script>

