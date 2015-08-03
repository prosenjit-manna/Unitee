<div class="page-footer">
	<div class="page-footer-inner">
		<?php $d = new DateTime("now");
                    echo $d->format("Y"); 
                ?> 
                &copy; Unitee Powered By <a href="http://lieison.com/" target="_blank" style="color:#BDBDBD; font-size:12px;">Lieison Working Together</a>.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

<script src="assert/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assert/plugins/jquery-migrate.min.js" type="text/javascript"></script>

<script src="assert/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assert/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assert/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assert/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assert/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assert/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assert/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assert/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assert/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assert/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assert/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assert/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assert/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assert/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assert/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assert/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="assert/dashboard/js/metronic.js" type="text/javascript"></script>
<script src="assert/dashboard/js/layout.js" type="text/javascript"></script>
<script src="assert/dashboard/js/quick-sidebar.js" type="text/javascript"></script>
<script src="assert/dashboard/js/demo.js" type="text/javascript"></script>
<script src="assert/dashboard/js/index.js" type="text/javascript"></script>

<?php
    if(isset($javascript) && is_array($javascript)){
         foreach($javascript as $j){
             echo "<script src='" , $j , "' type='text/javascript' ></script>";
         }
    }
?>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features 
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   
   <?php
        if(isset($js_loader) && is_array($js_loader)){
            foreach($js_loader as $jv){
                echo $jv;
            }
        }
   ?>
   
   
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>


