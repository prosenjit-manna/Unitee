

<!-- INICIO CONTENIDO -->
	<div class="page-content-wrapper">

	<!-- INICIO CONTENIDO -->
		<div class="page-content">
			<!-- INICIO TITULO DE LA PAGINA -->
			<h3 class="page-title">
			Unitee - Editar Proveedor
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
						<a href="#">Editar Proveedor</a>
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
						<div class="portlet-body">
							<div class="portlet-body form">
										<!-- INICIO FORM-->
											<div class="form-body">
                         <h5 lass="form-section">Los campos con * son Rqueridos</h5>
                        <div class="row">
                          <div class="col-md-6">
                                                                                                            <?php echo form_open("/TheProvider/EditProvider/" , array("method" => "post")); ?>
                              <input type="hidden" name="the_id" id="the_id" value="<?php echo $data->id_prov; ?>" />
                                                                                                            <h3 lass="form-section">Información de Contacto</h3><br>
                             <label class="control-label col-md-3">* Codigo</label>
                            <div class="form-group col-md-9">
                                                                                                                    <input value="<?php echo $data->codigo; ?>" disabled="disabled" type="text" id="" name="txt_empresa" class="form-control input-circle" placeholder="">
                            </div>
                            <label class="control-label col-md-3">* Empresa</label>
                            <div class="form-group col-md-9">
                                                                                                                    <input value="<?php echo $data->empresa; ?>" required="" type="text" id="" name="txt_empresa" class="form-control input-circle" placeholder="">
                            </div>
                            <label class="control-label col-md-3">* Contacto</label>
                            <div class="form-group col-md-9">
                                                                                                                     <input value="<?php echo $data->contacto_nombre; ?>" required="" type="text" id="" name="txt_contacto" class="form-control input-circle" placeholder="Nombre de Contacto">
                            </div>
                            <label class="control-label col-md-3">* Teléfono</label>
                            <div class="form-group col-md-9">
                                                                                                                    <input value="<?php echo $data->contacto_tel1; ?>" required="" type="text" id="" name="txt_telefono" class="form-control input-circle" placeholder="Numero de Telefono">
                            </div>
                                                                                                                <label class="control-label col-md-3">* Celular</label>
                            <div class="form-group col-md-9">
                                                                                                                    <input value="<?php echo $data->contacto_tel2; ?>"  required="" type="text" id="" name="txt_celular" class="form-control input-circle" placeholder="Numero de Celular">
                            </div>
                                                                                                                <label class="control-label col-md-3">Fax</label>
                            <div class="form-group col-md-9">
                                                                                                                    <input value="<?php echo $data->contacto_fax; ?>" type="text" id="" name="txt_fax" class="form-control input-circle" placeholder="Numero de FAX">
                            </div>
                                                                                                                <label class="control-label col-md-3">* Correo</label>
                            <div class="form-group col-md-9">
                                                                                                                    <input value="<?php echo $data->contacto_correo; ?>" required="" type="text" id="" name="txt_correo" class="form-control input-circle" placeholder="Correo Electronico">
                            </div>
                                                                                                                
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                                                                                                            <h3 lass="form-section">Dirección</h3><br>
                            <label class="control-label col-md-4">Local</label>
                            <div class="form-group col-md-8">
                                                                                                                    <input value="<?php echo $data->local; ?>" type="text" id="" name="txt_local" class="form-control input-circle" placeholder="Nombre del Local">
                            </div>
                                                                                                                <label class="control-label col-md-4">* Dirección 1</label>
                            <div class="form-group col-md-8">
                                                                                                                    <input value="<?php echo $data->dir1; ?>" required="" type="text" id="" name="txt_direccion1" class="form-control input-circle" placeholder="Nombre de la Direccion 1">
                            </div>
                                                                                                                <label class="control-label col-md-4">Dirección 2</label>
                            <div class="form-group col-md-8">
                                                                                                                    <input value="<?php echo $data->dir2; ?>" type="text" id="" name="txt_direccion2" class="form-control input-circle" placeholder="Nombre de la Direccion 2">
                            </div>
                                                        <label class="control-label col-md-4">* Pais</label>
                                                        <div class="form-group col-md-8">
                                                            <select required="" id="select_country" onchange="get_depto(this.value);" name="txt_pais" class="form-control input-circle">
                                                               
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-4">* Departamento</label>
                                                        <div class="form-group col-md-8">
                                                            <select required="" onchange="get_municipio(this.value);" id="select_depto" name="txt_depto" class="form-control input-circle">
                                                               
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-4">* Ciudad</label>
                                                        <div class="form-group col-md-8">
                                                            <select required="" id="select_city" class="form-control input-circle" name="txt_ciudad">
                                                                <?php echo $data->descripcion; ?>
                                                            </select>
                                                        </div>
                            
                          <!--/span-->
                            </div>
                                                    <div class="col-md-12">
                                                        <h3 lass="form-section">Descripci&oacute;n</h3><br>
                                                    </div>
                                                    <label class="control-label col-md-3">Descripci&oacute;n de la Empresa</label>
                                                    <div class="form-group col-md-9">
                                                        <textarea id="txt_descripcion" name="txt_descripcion" rows="4" cols="50" class="form-control input-circle" placeholder="Descripcion de la Empresa">
                                                            <?php echo $data->descripcion; ?>
                                                        
                                                        </textarea>
                                                    </div>


                                                </div>
                      <div class="form-actions right">
                                                                                            <a href="<?php echo site_url("/0/proveedor=view_proveedor"); ?>" class="btn default">Cancelar</a>
                                                                                            <button  id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
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
        <script>
        
        
            var load_paises = function(){
                var tasking = new jtask();
                    tasking.url = "<?php echo site_url("/c/2" ); ?>";
                    tasking.success_callback(function(data){
                          var j = JSON.parse(data);
                          var c = $("#select_country");
                          c.html("");
                          var iso = "<?php echo $data->pais_iso; ?>" ;
                          $.map(j , function(k){
                              
                              if(k.id == iso){
                                  c.prepend("<option value='" + k.id + "'>" + k.name + "</option>");
                                  get_depto(k.id);
                              }
                              else{
                                c.append("<option value='" + k.id + "'>" + k.name + "</option>");
                              }
                          });
                    });
                    tasking.do_task();
            };
            
            
            var get_depto = function(iso){
                   var tasking = new jtask();
                    tasking.url = "<?php echo site_url("/country/GetDepto/" ); ?>";
                    tasking.data = { "iso" : iso} ;
                    
                    tasking.success_callback(function(data){
                          var c =$("#select_depto");
                          c.html("");
                          c.append('<option >Elige un Departamento</option>');
                          var j = JSON.parse(data);
                          var id = "<?php echo $data->depto_codigo; ?>";
                          $.map(j , function(k){
                              if(k.id == id){
                                c.append('<option selected="selected" value="' + k.id + '">' + k.name + '</option>');
                                get_municipio(k.id);
                              }
                              else
                                c.append('<option value="' + k.id + '">' + k.name + '</option>');  
                          });
                    });
                    tasking.do_task();
            };
            
            var get_municipio = function(id){
                   var tasking = new jtask();
                    tasking.url = "<?php echo site_url("/country/GetMunicipio/" ); ?>";
                    //Direccion del controlador donde se obtiene los datos
                    tasking.data = { "id" : id} ;
                    tasking.success_callback(function(data){
                      //tasking libreria de rolando para hacer procesos de segundo plano
                          var ciu =$("#select_city");
                          //seleccion del id del select donde se desean mostrar los datos
                          ciu.html("");
                          //html para cambiar algo del en una etiqueta html reemplazando la anterior
                          ciu.append('<option selected="selected">Elige una Ciudad</option>');
                          //para mandar como lista
                          var j = JSON.parse(data);
                          //JSON Parse para transformar un elemento json a un objeto
                          
                          var id = "<?php echo $data->municipio_codigo; ?>";
                          
                          
                          $.map(j , function(k){
                              if(id == k.id)
                                 ciu.append('<option selected="selected" value="' + k.id + '">' + k.name + '</option>');
                              else
                                 ciu.append('<option value="' + k.id + '">' + k.name + '</option>'); 
                          });
                    });
                    tasking.do_task();
            };
        
        </script>