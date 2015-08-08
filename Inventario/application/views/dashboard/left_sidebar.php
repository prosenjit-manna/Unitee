<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
                    <!-- SIBEDAR INIT -->
                    <ul name="sidebar_" id="sidebar_" class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <!-- SIDEBAR SYSTEM COMO TAREA ASINCRONA O PROCESO DE SEGUNDO PLANO -->
                        <li>
                            <br><br>
                            <a >Cargando ...</a>
                        </li> 
                          		
                    </ul>
                    <!-- END SIDEBAR -->
		</div>
	</div>
<!-- END SIDEBAR -->
<script>
    
    var SidebarSystem = function(){
       
        var load = function(){
            var tasking = new jtask();
            tasking.url = "<?php echo site_url("/sidebar/"); ?>";
            tasking.success_callback(function(result){
                 $("#sidebar_").html(result);
            });
            tasking.do_task();
        };
    return {
        init: function() {
            load();
        }
    };  
      
    }();
    
</script>