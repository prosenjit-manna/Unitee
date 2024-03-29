<?php echo $close_container; ?>
<div class="page-footer">
	<div class="page-footer-inner">
		<?php $d = new DateTime("now");
                    echo $d->format("Y"); 
                ?> 
                &copy; Unitee Powered By <a href="http://lieison.com/" target="_blank" style="color:#BDBDBD; font-size:12px;">Lieison Working Together S.A. de C.V</a>.
                <?php 
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong align='right'>$ttl seg</strong>";
                ?>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

<script src="<?php echo $route;?>assert/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery-migrate.min.js" type="text/javascript"></script>


<script src="<?php echo $route;?>assert/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/dashboard/js/metronic.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/dashboard/js/layout.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/dashboard/js/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/dashboard/js/demo.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/dashboard/js/index.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/plugins/ui-general.js" type="text/javascript"></script>

<!-- SYSTEM LIBRARIES  -->
<script src="<?php echo $route;?>assert/system/dashboard/jstask/task.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/system/dashboard/request.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/system/dashboard/metadata.js" type="text/javascript"></script>
<script src="<?php echo $route;?>assert/system/dashboard/notifications.js" type="text/javascript"></script>

<?php
    if(isset($javascript) && is_array($javascript)){
         foreach($javascript as $j){
             echo "\n<script src='" , $j , "' type='text/javascript' ></script>";
         }
    }
?>




<!-- END PAGE LEVEL SCRIPTS -->
<script>

var $uri = "<?php echo site_url(); ?>";
    
jQuery(document).ready(function() {    
 
   try{
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features 
        Index.init();   
        Index.initDashboardDaterange();
        Tasks.initDashboardWidget();
        UIToastr.init();
        
   }catch(ex){
        console.log("Error al momento de cargar ... " + ex.message);
   }
   
   try{
       /**
        * script que funciona para la carga de los elementos 
        * al inicio del dashboard
        * con la interface _JSdashboard() 
        * */
       var ds = new dashboard_loader();
       ds.load();
   }
   catch(ex){}
       
   
   try{
       //INICIA EL SIDEBAR IZQUIERDO DEL SISTEMA ...
       SidebarSystem.init();
   }catch(ex){
       console.log("Error al momento de cargar archivos del sistema " + ex.message);
   }
   
    try{
       if( window.localStorage.getItem("metadata") === null){
           /**
            * @author Rolando Arriaza
            * @version 1.0
            *   SISTEMA DE METADATA PARA UNA MEJOR 
            *   CARGA SE GENERA EN UN ALMACENAMIENTO LOCAL.
            *   
            *   -------------------------------------
            *   ESTA APP NO LLEVA CARGA DE METADATOS ....
            * */
           
       }
   }catch(ex){
       console.log("Error al momento de cargar las metas " + ex.message);
   }
   
   try{
       
       
       //FUNCION PARA CARGAR LAS NOTIFICACIONES DEL SISTEMA
       //ESTAS NOTIFICACIONES SE VERAN EN EL HEAD
       var inotification = function(){
            var n = new notifications($uri);
            n.head = "notification_header";
            n.body = "notification_body";
            n.footer = "notification_footer";
            n.ncount = "notification_count";
            n.show();
       };
       
       inotification();
       
       setInterval(function(){ 
           inotification();
       }, 30000);
       
       
      
   }catch(ex){
        console.log("Error al momento de cargar las notificaciones " + ex.message);
   }
   
   <?php
        if(isset($js_loader) && is_array($js_loader)){
            echo "/*Scripts de inicio generado por el sistema*/ \n";
            foreach($js_loader as $jv){
                echo  "\t" , $jv , "\n";
            }
        }
   ?>
   
   
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>


