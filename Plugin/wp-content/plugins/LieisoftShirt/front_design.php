<?php

defined("LS_PLUGIN_DIR") or define("LS_PLUGIN_DIR", plugins_url("/" . LS_NAME .  "/"));
defined("LS_CREATE") or define("LS_CREATE", 0);
defined("LS_UPDATE") or define("LS_UPDATE", 1);

class LS_DESIGN {
    
    public  function __construct() {
        
        wp_register_script("fabric", LS_PLUGIN_DIR . "js/fabric.js"  );
        wp_register_script("fancy", LS_PLUGIN_DIR . "js/jquery.fancyProductDesigner.js" );
        wp_register_script("fancy_ui", LS_PLUGIN_DIR . "js/jquery-ui.js"  );
        wp_register_script("start", LS_PLUGIN_DIR . "js/start.js" );
        wp_register_script("js_step", LS_PLUGIN_DIR . "js/jquery.steps.js" );
        wp_register_script("select2", LS_PLUGIN_DIR . "js/select2.js" );
        wp_register_script("task", LS_PLUGIN_DIR . "js/task.js" );
        wp_register_script("color", LS_PLUGIN_DIR . "js/pick-a-color-1.2.3.min.js" );
        wp_register_script("color-depend", LS_PLUGIN_DIR . "js/tinycolor-0.9.15.min.js" );
        wp_register_script("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" );
        wp_register_script("tag", LS_PLUGIN_DIR . "js/tag_input.js" );
        
        
        /*PLUGIN SPACE */
        
        wp_register_script("pdatepicker", 
                LS_PLUGIN_DIR . "plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" );
        wp_register_script("pdatepicker2", 
                LS_PLUGIN_DIR . "plugins/bootstrap-datetimepicker/moment.js" );
        
       wp_register_script("slider", 
                LS_PLUGIN_DIR . "plugins/slider/js/bootstrap-slider.js" );
       
       wp_register_script("crop", 
                LS_PLUGIN_DIR . "plugins/crop/js/jquery.Jcrop.js" );

    
        
        wp_enqueue_script('jquery' );
        wp_enqueue_script('crop' );
       // wp_enqueue_script("pdatepicker");
       // wp_enqueue_script("pdatepicker2");
        wp_enqueue_script('task' );
        wp_enqueue_script('tag' );
        wp_enqueue_script('color-depend' );
        wp_enqueue_script('color' );
        wp_enqueue_script("fabric");
        wp_enqueue_script("bootstrap");
        wp_enqueue_script("fancy");
        wp_enqueue_script("fancy_ui");
        wp_enqueue_script("js_step");

        

      //  wp_enqueue_script("pdatepicker");
      //  wp_enqueue_script("pdatepicker2");

        wp_enqueue_script("slider");
        

        wp_register_style("fancy_ui_css", LS_PLUGIN_DIR . "css/jquery-ui.css");
        wp_register_style("fancy_font", LS_PLUGIN_DIR . "css/icon-font.css");
        wp_register_style("fancy_plugin_css", LS_PLUGIN_DIR . "css/plugins.min.css");
        wp_register_style("fancy_designer_css", LS_PLUGIN_DIR . "css/jquery.fancyProductDesigner.css");
        wp_register_style("fancy_fdesigner_css", LS_PLUGIN_DIR . "css/jquery.fancyProductDesigner-fonts.css");
        wp_register_style("t1", LS_PLUGIN_DIR . "css/jquery.steps.css");
        wp_register_style("t2", LS_PLUGIN_DIR . "css/normalize.css");
        wp_register_style("t3", LS_PLUGIN_DIR . "css/main.css");
        wp_register_style("fa", LS_PLUGIN_DIR . "css/font-awesome-4.3.0/css/font-awesome.css");
        wp_register_style("color-style", LS_PLUGIN_DIR . "css/pick-a-color-1.2.3.min.css");
        wp_register_style("tag_css", LS_PLUGIN_DIR . "css/bootstrap-tagsinput.css");
        
        
        wp_register_style("dt1", LS_PLUGIN_DIR . "plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css");


        wp_register_style("slidercss", LS_PLUGIN_DIR . "plugins/slider/css/bootstrap-slider.css");

        
        wp_register_style("bt1","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" );
        wp_register_style("bt2","//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" );
        
        
         wp_register_style("css_crop", LS_PLUGIN_DIR . "plugins/crop/css/jquery.Jcrop.css");

        wp_enqueue_style("css_crop");    
        wp_enqueue_style("tag_css");
        wp_enqueue_style("bt1");
        wp_enqueue_style("bt2");
        wp_enqueue_style("color-style");
        wp_enqueue_style("fancy_ui_css");
        wp_enqueue_style("fancy_font");
        wp_enqueue_style("fancy_plugin_css");
        wp_enqueue_style("fancy_designer_css");
        wp_enqueue_style("fancy_fdesigner_css");
        wp_enqueue_style("t1");
        wp_enqueue_style("t2");
        wp_enqueue_style("t3");
        wp_enqueue_style("fa");

        //wp_enqueue_style("dt1");    

        wp_enqueue_style("slidercss");
       

        
       
    }
    
    public function render($type = LS_CREATE , $width = null , $height = null){
        include 'front_render.php';
    }
    
    
    public function show_woocomerce_designs(){
        global $current_user;
        echo "<pre>";
        print_r($current_user);
        echo "</pre>";
    }
    
    
    public function update_render($width = null , $height = null){
        include 'update_render.php';
    }
    
    
}



$design = new LS_DESIGN();




