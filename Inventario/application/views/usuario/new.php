<?php 
    /**
     * @@ name : new user
     * @@ version : 1.2
     * @@ id: _user_001
     */    
?>

<!-- INICIO CONTENIDO -->
	<div class="page-content-wrapper">

	<!-- INICIO CONTENIDO -->
		<div class="page-content">
			<!-- INICIO TITULO DE LA PAGINA -->
			<h3 class="page-title">
			Unitee - Nuevo Usuario 
			</h3>
			<!-- FINAL TITULO DE LA PAGINA -->

			<!-- INICIO BREADCUMBS -->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-home"></i>
                                                <a href="<?php echo site_url("/0/"); ?>">Home</a>
						<i class="icon-angle-right"></i>
					</li>
					<li>
						<a href="#">Nuevo Usuario</a>
					</li>
				</ul>
				<div class="page-toolbar">
                                    
				</div>
			</div>
			<!-- FINAL BREADCUMBS -->

			<!-- INICIO DASHBOARD STATS -->
           <div class="page-content-wrapper">

			<!-- INICIO PAGE CONTENT-->
			<div class="row scroller" style="height:450px" data-rail-visible="1" >
				<div class="col-md-12">
					<!-- INICIO Portlet PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption font-green-sharp">
								<i class="icon-speech font-green-sharp"></i>
								<span class="caption-subject">Información Usuario</span>
							</div>
						</div>
						<div class="portlet-body">
							<div class="portlet-body form">
										<!-- INICIO FORM-->
										<?php echo form_open("TheUser/Add/" , array("method" => "post")); ?>
											<div class="form-body">
												<div class="row">
													<div class="col-md-6">
													   <label class="control-label col-md-2">Nombres</label>
														<div class="form-group col-md-10">
                                                                                                                    <input required="" type="text" id="txt_nombre" name="txt_nombre" class="form-control input-circle" placeholder="Nombres">
														</div>
														<label class="control-label col-md-2">Apellidos</label>
														<div class="form-group col-md-10">
                                                                                                                    <input required="" type="text" id="txt_apellido" name="txt_apellido" class="form-control input-circle" placeholder="Apellidos">
														</div>
														<label class="control-label col-md-2">Correo</label>
														<div class="form-group col-md-10">
                                                                                                                    <input required="" id="txt_correo" name="txt_correo" type="email" class="form-control input-circle" placeholder="Email Address">
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<label class="control-label col-md-2">Usuario</label>
														<div class="form-group col-md-10">
                                                                                                                    <div class="input-icon right">
                                                                                                                        <i name="change_" id="change_" style="display:none;" class="icon-check" data-original-title="Usuario aceptado ..."></i>
												<input onkeyup="check_user(this.value);" required="" type="text" id="txt_user" name="txt_user" class="form-control input-circle" placeholder="Nombre de Usuario ">
                                                                                                </div>
                                                                                                                    
                                                                                                                </div>
														<label class="control-label col-md-2">Contraseña</label>
														<div class="form-group col-md-10">
                                                                                                                    <input required=""  type="password" id="txt_password" name="txt_password" class="form-control input-circle" placeholder="Contraseña">
														</div>
														<label class="control-label col-md-2">Repetir</label>
														<div class="form-group col-md-10">
                                                                                                                    <input required="" onkeyup="check_();" type="password" id="txt_repeat_pass" name="txt_repeat_pass" class="form-control input-circle" placeholder="Repetir Contraseña">
														</div>
														<label class="control-label col-md-2">Autogenerar</label>
														<div class="form-group col-md-10">
															<div class="radio-list">
                                                                                                                            <input onclick="check_();" onchange="check_();" type="checkbox" id="txt_generate" name="txt_generate" class="make-switch" data-size="small" data-on-color="info" data-on-text="SI" data-off-color="default" data-off-text="NO">
														</div>
													</div>
													<!--/span-->
												</div>
												
											</div>
											<div class="form-actions right">
                                                                                            <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                                                                                            <button  id="send" name="send" disabled="disabled" type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
											</div>
										<?php echo form_close(); ?>
										<!-- FINAL FORM-->
									</div>
						</div>
					</div>
					<!-- FINAL Portlet PORTLET-->
				</div>
			</div>
			<!-- FINAL PAGE CONTENTENIDO-->
		</div>
		<!-- FINAL ESTILOS DE LA BARRA -->

	</div>

	<!-- FINAL CONTENIDO -->
        
 <script type="text/javascript" >
    function check_(){
    
        var $p1         = document.getElementById("txt_password").value;
        var $p2         = document.getElementById("txt_repeat_pass").value;
        var $auto       = document.getElementById("txt_generate").checked;
       
       
        if($auto){
            document.getElementById("send").disabled = false;
        }else if($p1 === $p2 && $p1 !== "" ){
            document.getElementById("send").disabled = false;
           
        }else{
            document.getElementById("send").disabled = true;
           
        }
        
    };
    
    var check_user = function(value){
         var tasking = new jtask();
         tasking.url = "<?php echo site_url("/TheUser/exists/" ); ?>";
         tasking.data = { "name" : value }; 
         tasking.success_callback(function(s){
           
              var change      = $("#change_");
             if(s==1 || s== true){
                  document.getElementById("send").disabled = true;
                   change.css("display" , "none");
             }
             else{
                  document.getElementById("send").disabled = false;
                   change.css("display" , "block");
             }
         });
         tasking.do_task();
    };
 </script>