<?php 
    /**
     * @@ name : edit
     * @@ version : 1.2
     * @@ id: _user_001
     */    
?>
<style>
  .class_tr {
        width: 100%;
        display: inline-table;
  }
  .class_tbody
  {
    overflow-y: scroll;
    overflow-wrap: scroll;
    height: 380px;
    width: 100%;
    position: relative;
  }
</style>
<!--FINAL ESTILOS DE LA BARRA-->
<?php 

   $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
   $rol = isset($_REQUEST['rol']) ? TRUE : FALSE;
?>

<!-- INICIO CONTENIDO -->
	<div class="page-content-wrapper">
	<!-- INICIO CONTENIDO -->
		<div class="page-content">
			<!-- INICIO TITULO DE LA PAGINA ACRUAL-->
			<h3 class="page-title">
			Unitee - Editar Usuario 
			</h3>
			<!-- FINAL TITULO DE LA PAGINA ACRUAL-->

			<!-- INICIO TITULO PAGE BAR BREADCUMBS-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-home"></i>
                                                <a href="<?php echo site_url("/0/"); ?>">Home</a>
						<i class="icon-angle-right"></i>
					</li>
					<li>
						<a href="#">Editar Usuario</a>
					</li>
				</ul>
				<div class="page-toolbar">
                                    
				</div>
			</div>
			<!-- FINAL TITULO PAGE BAR BREADCUMBS-->

			<!-- INICIO DEL MAIN CONTENIDO-->
			<div class="page-content-wrapper">
				<!-- INICIO FILA DEL CONTENIDO -->
				<div class="row">
					<!-- INICIO PORTLET DEL CONTENIDO-->
					<div class="col-md-12 ">
					<!-- INICIO PORTLET LIGHT-->
					<div class="portlet light">
						<!-- INICIO PORTLET TABS-->
						<div class="portlet-title tabbable-line">
							<div class="caption font-green-sharp">
								<i class="icon-speech font-green-sharp"></i>
								<span class="caption-subject">Editar Roles e Informacion de USuario</span>
							</div>
							<ul class="nav nav-tabs">
								<li>
                                                                    <select onchange="c(this.value);" class="btn btn-default dropdown-toggle input-circle">
									<option value="-1" selected="selected">Seleccione el Usuario</option>
									<?php 
                                                                            
                                                                            $class = &get_instance();
                                                                            $class->load->model("user/user_edit");
                                                                            $result = $class->user_edit->GetUsers();
                                                                            ob_start();
                                                                            if(count($result) >= 1){
                                                                                foreach($result as $user){
                                                                                    echo "<option value='" . $user['id_login'] . "' >" . $user['user'] . "</option>";
                                                                                }
                                                                            }
                                                                            ob_end_flush();
                                                                        ?>
								</select>
								</li>
                                                                <li id="user_" name="user_" class="active">
									<a href="#portlet_tab1" data-toggle="tab">
									Editar Usuario</a>
								</li>
                                                                <li id="roles_" name="roles_">
									<a href="#portlet_tab2" data-toggle="tab">
									Editar Roles</a>
								</li>
							</ul>
						</div>
						<!-- FINAL PORTLET TABS-->
                                                <div id="messages">
                                                    
                                                </div>
						
						<!-- INICIO PORTLET NODY-->
						<div class="portlet-body">
							<!-- INICIO PORTLET TAB CONTENT-->
							<div class="tab-content">
								<!-- INICIO DEL PRIMER TAB PANE-->
								<div class="tab-pane " id="portlet_tab2">
									<!-- INICIO DEL DIV DEL SCROLLER-->
									<div class="scroller" style="height: 270px;">
												<!--INICIO FORMULARIO ROLES-->
												<form action="#" class="horizontal-form">
							                 		<div class="portlet light profile-sidebar-portlet col-md-4">
														<!-- SIDEBAR USERPIC -->
														<div class="profile-userpic">
							                                    <img src="<?php echo $route; ?>images/dashboard/avatar.png" class="img-responsive" alt="" style="width:24%;height:14%;">      
							                            </div>
														<!-- FINAL SIDEBAR USERPIC -->
														<!-- SIDEBAR USER TITLE -->
														<div class="profile-usertitle">
															<div class="profile-usertitle-name">
															   Otorgar ROL #1 
															</div>
														</div>
														<!-- FINAL SIDEBAR USER TITLE -->
														<div class="radio-list" align="center">
															<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
														</div>
													</div>
													<div class="portlet light profile-sidebar-portlet col-md-4">
														<!-- SIDEBAR USERPIC -->
														<div class="profile-userpic">
							                                    <img src="<?php echo $route; ?>images/dashboard/avatar.png" class="img-responsive" alt="" style="width:24%;height:14%;">      
							                            </div>
														<!-- FINAL SIDEBAR USERPIC -->
														<!-- SIDEBAR USER TITLE -->
														<div class="profile-usertitle">
															<div class="profile-usertitle-name">
															   Otorgar ROL #2 
															</div>
														</div>
														<!-- FINAL SIDEBAR USER TITLE -->
														<div class="radio-list" align="center">
															<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
														</div>
													</div>
													<div class="portlet light profile-sidebar-portlet col-md-4">
														<!-- SIDEBAR USERPIC -->
														<div class="profile-userpic">
							                                    <img src="<?php echo $route; ?>images/dashboard/avatar.png" class="img-responsive" alt="" style="width:24%;height:14%;">      
							                            </div>
														<!-- FINAL SIDEBAR USERPIC -->
														<!-- SIDEBAR USER TITLE -->
														<div class="profile-usertitle">
															<div class="profile-usertitle-name">
															   Otorgar ROL #3
															</div>
														</div>
														<!-- FINAL SIDEBAR USER TITLE -->
														<div class="radio-list" align="center">
															<input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
														</div><br><br>
														<div class="form-actions" align="right">
																<button type="button" class="btn default">Cancelar</button>
																<button type="submit" class="btn blue" id="showtoast"><i class="fa fa-check"></i>Guardar</button>
														</div>
													</div>

												</form>
												<!--FINAL FORMULARIO ROLES-->

									</div>
									<!-- FINAL DEL DIV DEL SCROLLER-->

								</div>
								<!-- FINAL DEL PRIMER TAB PANE-->

								<!-- INICIO DEL SEGUNDO TAB PANE-->
								<div class="tab-pane active" id="portlet_tab1">
									<!-- INICIO DEL DIV DEL SCROLLER-->
									<div class="scroller" style="height: 250px;">
													<!--INICIO FORMULARIO INFO USUARIO-->
													<form action="#" class="horizontal-form">
															<div class="col-md-6">
															   <label class="control-label col-md-2">Nombres</label>
																<div class="form-group col-md-10">
                                                                                                                                    <input type="text" name="txt_nombres" id="txt_nombres" class="form-control input-circle" placeholder="Nombres" required>
																</div>
																<label class="control-label col-md-2">Apellidos</label>
																<div class="form-group col-md-10">
																	<input name="txt_apellidos" id="txt_apellidos" type="text"  class="form-control input-circle" placeholder="Apellidos" required>
																</div>
																<label class="control-label col-md-2">Correo</label>
																<div class="form-group col-md-10">
																	<input name="txt_email" id="txt_email" type="email" class="form-control input-circle" placeholder="Email Address" required>
																</div>
															</div>
															<!--/span-->
															<div class="col-md-6">
																<label class="control-label col-md-2">Usuario</label>
																<div class="form-group col-md-10">
																	<input name="txt_user" id="txt_user" type="text" class="form-control input-circle" disabled="disable" placeholder="Nombre de " required>
																</div>
																<label class="control-label col-md-2">Ultima Conexión</label>
																<div class="form-group col-md-10">
																	<input name="txt_conexion" id="txt_conexion" type="text" class="form-control input-circle" disabled="disable" placeholder="Nombre de " required>
																</div><br>
																<label class="control-label col-md-4">Dar de Baja</label>
																<div class="form-group col-md-8">
																	<div class="radio-list">
																		<input type="checkbox" name="txt_baja" id="txt_baja" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
																	</div>
																</div>
																<label class="control-label col-md-4">Autogenerar</label>
																<div class="form-group col-md-8">
																	<div class="radio-list">
																		<input type="checkbox" name="txt_pass" id="txt_pass" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
																	</div>
																</div>
															</div>
															<br><br><br><br><br>
															<div class="form-actions" align="right">
                                                                                                                            <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
																<button type="submit" class="btn blue" id="showtoast"><i class="fa fa-check"></i>Guardar</button>
															</div>
													</form>
													<!--FINAL FORMULARIO INFO USUARIO-->

									</div>
									<!-- FINAL DEL DIV DEL SCROLLER-->

								</div>
								<!-- FINAL DEL SEGUNDO TAB PANE-->

							</div>
							<!-- FINAL PORTLET TAB CONTENT-->

						</div>
						<!-- FINAL PORTLET NODY-->

					</div>
					<!-- INICIO PORTLET LIGHT-->

				</div>
				<!-- FINAL PORTLET DEL CONTENIDO-->

				</div>
				<!-- FINAL FILA DEL CONTENIDO -->

			</div>
			<!-- FINAL DEL MAIN CONTENIDO-->

		</div>
		<!-- FINAL CONTENIDO -->

	</div>
	<!-- FINAL CONTENIDO -->
        
        <script>
            
            var $user = null;
            
            var i = function(){
                
                var rol = "<?php echo $rol; ?>";
                if(!rol){ return null; }
                $("#user_").attr("class" , "");
                $("#roles_").attr("class" , "active");
                $("#portlet_tab2").attr("class" , "tab-pane active");
                $("#portlet_tab1").attr("class" , "tab-pane ");
                
                var id = "<?php echo $id; ?>";
                if(id != null){
                    c(id);
                }
            };
            
            
           
            
            var c = function(val){
               if(val === "undefined" || val == null){ return; }
               
                   var tasking = new jtask();
                   tasking.url = "<?php echo site_url("/TheUser/GetUserInfo/" ); ?>";
                   tasking.data = { "data" : val }; 
                   tasking.beforesend = true;
                   tasking.config_before(function(){
                       $("#messages").html(
                               '<div class="alert alert-block alert-success fade in">' +
                               '<p><b>Cargando ...</b>   Por favor espere.</p>' +
                               '</div>'
                        );
                   });
                   tasking.success_callback(function(s){
                      $("#messages").html("");
                      $user  = JSON.parse(s);
                     $.map($user, function(u){
                          $("#txt_nombres").val(u.nombres);
                          $("#txt_apellidos").val(u.apellidos);
                          $("#txt_email").val(u.email);
                          $("#txt_user").val(u.user);
                          $("#txt_conexion").val(u.last_date);
                          var status = u.status;
                          if(status == 1)
                               $("#txt_baja").prop("checked" , "checked");
                          else
                               $("#txt_baja").prop("checked" , "checked");
                      });
                   });
                   tasking.do_task();
               
            };
            
            
            
        </script>