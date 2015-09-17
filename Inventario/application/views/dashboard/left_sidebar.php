<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
		<div name="sidebar_" id="sidebar_" class="page-sidebar navbar-collapse collapse">
                    <!-- SIBEDAR INIT -->
                    <!-- SIDEBAR ASINC TASK-->
                    <?php
                        for($i=0; $i < 12; $i++):
                           echo "<br>";
                        endfor;
                    ?>
                    <div align="center">
                        <?php
                        
                          $c_sidebar = &get_instance();
                          $c_sidebar->load->library("metadata");
                          $c_name       = $c_sidebar->metadata->GetMeta("sidebar_name");
                          $c_logo       = $c_sidebar->metadata->GetMeta("sidebar_logo");
                        ?>
                        <img src="<?php echo site_url() . $c_logo->value; ?>" width="150" height="40" />
                        <?php 
                          echo $c_name->value;
                        ?>
                    </div>
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
                   var div = '<ul  class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">';
                   var sdiv = '</ul>';
                  $("#sidebar_").html(div  + result + sdiv);
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