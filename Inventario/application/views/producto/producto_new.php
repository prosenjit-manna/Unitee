<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
         <?php  if (isset($_REQUEST['err'])):
                        switch ($_REQUEST['err']):
                            case 0:
                                echo '<div class="alert alert-block alert-success fade in">
                                           <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button><p>Producto Guardado con Exito</p>
                                                              </div>';
                                 break;
                            case 1:
                                echo ' <div class="alert alert-block alert-danger fade in">
                                                  <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"> </button><p>No se pudo guardar el producto,  favor intentar de nuevo.</p>
                                                            </div>';
                                break;
                            
                            
                        endswitch;
                    endif;
                 ?>
        <!-- INICIO TITULO DE LA PAGINA -->
       
        
        
        <h3 class="page-title">
            Unitee - Nuevo Producto
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
                    <a href="#">Nuevo Producto</a>
                </li>
            </ul>
            <div class="page-toolbar">               
            </div>
        </div>


        <!-- FINAL BREADCUMBS -->
        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <!-- INICIO PAGE CONTENT-->
            <div class="row scroller" style="height:375px" data-rail-visible="1" >

            	
                <!-- INICIO Portlet PORTLET-->
                <div class="portlet">
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase">Nuevo Producto</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="portlet-body form">
                                <!-- INICIO FORM-->
                                <?php echo form_open("/Productos/New_Product/", array("method" => "post")); ?>

                                <div class="form-body">
                                    <div class="row">
                                        <h5 lass="form-section">Los campos con * son Requeridos</h5>
                                        <div class="col-md-6">
                                            <h3 lass="form-section">Información del Producto</h3><br>
                                            <label class="control-label col-md-3">* Nombre</label>
                                            <div class="form-group col-md-9">
                                                <input required="" type="text" id="name_" onchange = "generate_SKU();" name="txt_nombre" class="form-control input-circle" placeholder="Nombre del Producto">
                                            </div>
                                            <label class="control-label col-md-3">* Color</label>
                                            <div class="form-group col-md-9">
                                                <select required="" id="select_colors" name="txt_color" class="form-control input-circle">
                                                </select>
                                            </div>
                                            <label class="control-label col-md-3">* Margen</label>
                                            <div class="form-group col-md-9">
                                                <input required="" type="text" id="" name="txt_margen" class="form-control input-circle" placeholder="Margen">
                                                <span class="help-block" style="font-size:8pt;">EL limite minimo requerido para que el sistema notifique la poca disponibilidad del  producto</span>
                                            </div>
                                            <label class="control-label col-md-3">* Unidad</label>
                                            <div class="form-group col-md-9">
                                                <select required="true" id="select_unidad" name="txt_unidad" class="form-control input-circle">
                                                </select>
                                            </div>                                                                   
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <br><br><br><br>
                                            <label class="control-label col-md-3">* Descripción</label>
                                            <div class="form-group col-md-9">
                                                <textarea required="" id="txt_descripcion" name="txt_descripcion" rows="2" class="form-control input-circle" placeholder="Descripcion del producto"></textarea>
                                            </div>
                                            <label class="control-label col-md-3">* SKU</label>
                                            <div class="form-group col-md-9">
                                                <input readonly="" type="text" id="SKU" name="txt_sku" class="form-control input-circle" placeholder="SKU del Producto">
                                            </div>
                                            <label class="control-label col-md-3">* Precio</label>
                                             <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_" style="display:none;" class="icon-check" data-original-title="Usuario aceptado ..."></i>
                                                    <input onkeyup="validate_price(this.value);" required="" type="text" id="precio" name="txt_precio" class="form-control input-circle" placeholder="Precio del producto">
                                                </div>

                                            </div>
                                            
                                            
                                            <label class="control-label col-md-3">* Cantidad</label>
                                            <div class="form-group col-md-9">
                                                <input type="text" id="" name="txt_cantidad" class="form-control input-circle" placeholder="Cantidad del producto">
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                                        <button  id="send" name="send"  disabled="disable" type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
                                    </div>
                                    <!-- FINAL FORM-->
                                    <?php echo form_close(); ?>
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


            var load_colors = function () {
                var tasking = new jtask();
                tasking.url = "<?php echo site_url("/Productos/get_colors"); ?>";
                tasking.success_callback(function (d) {
                    var data = JSON.parse(d);
                    $.map(data, function (a) {
                        $('#select_colors').append("<option value=" + a.id + ">" + a.name + "</option>");
                    });
                });
                tasking.do_task();
            };

            var load_unidad = function () {
                var tasking = new jtask();
                tasking.url = "<?php echo site_url("/Productos/get_unidad"); ?>";
                tasking.success_callback(function (d) {
                    var data = JSON.parse(d);
                    $.map(data, function (a) {
                        $('#select_unidad').append("<option value=" + a.id + ">" + a.name + "</option>");
                    });
                });
                tasking.do_task();
            };

            var generate_SKU = function () {
                var name = $('#name_').val();
                if (name.length >= 3) {
                    var tasking = new jtask();
                    tasking.url = "<?php echo site_url("/Productos/generate_sku"); ?>";
                    tasking.success_callback(function (d) {
                        var sku = JSON.parse(d);
                        var date_now = "<?php echo date("Ymd") ?>";
                        $.map(sku, function (a) {
                            var current = parseInt(a.id) + 1;
                            name = name.substring(0, 3);
                            $('#SKU').val(name + "-" + current + "-" + date_now);
                        });

                    });
                    tasking.do_task();
                }
            };



            var validate_price = function () {
                var precio = $("#precio").val();
                if (precio == "" || isNaN(precio)) {
                    $('#send').attr("disabled", true);
                }
                else {

                    $('#send').attr("disabled", false);

                }

            };




        </script>