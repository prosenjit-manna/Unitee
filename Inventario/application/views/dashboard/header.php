<!DOCTYPE html>

<html lang="es" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Unitee | Dashboard</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>


<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assert/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assert/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assert/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assert/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assert/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="assert/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="assert/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="assert/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<?php

    if(isset($styles)){
         if(is_array($styles)){
             foreach ( $styles as $v){
                 echo "<link href='" , 
                         $v["link"] ,
                         "' rel='" , 
                         $v['stylessheet'] , 
                         "' type='text/css'" 
                         , " />" ;
             }
         }
    }

?>
<!-- END PAGE LEVEL PLUGIN STYLES -->

<!-- BEGIN PAGE STYLES -->
<link href="assert/dashboard/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->

<!-- BEGIN THEME STYLES -->
<link href="assert/dashboard/css/components.css" rel="stylesheet" type="text/css"/>
<link href="assert/dashboard/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assert/dashboard/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assert/dashboard/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assert/dashboard/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->

<link rel="shortcut icon" href="favicon.ico"/>
</head>
    
