<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->

<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <br>
                            <?php
                                
                                $sidebar = &get_instance();
                                $sidebar->load->model("system/sidebar_engine");
                                $sidebar->sidebar_engine->_echo();
                            ?>			
                        </ul>

			<!-- END SIDEBAR MENU -->
		</div>
	</div>
<!-- END SIDEBAR -->