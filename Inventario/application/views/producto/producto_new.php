<!-- INICIO CONTENIDO -->

<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <?php
        if (isset($_REQUEST['err'])):
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
            <div class="row scroller" style="height:425px" data-rail-visible="1" >


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
                                            <label class="control-label col-md-4">* Nombre</label>
                                            <div class="form-group col-md-8">
                                                <input required="" type="text" id="name_" onchange = "generate_SKU();" name="txt_nombre" class="form-control input-circle" placeholder="Nombre del Producto">
                                            </div>
                                            <label class="control-label col-md-4">* Color</label>
                                            <div class="form-group col-md-8">
                                                <select required="" id="select_colors" name="txt_color" class="form-control input-circle">
                                                </select>
                                            </div>
                                            <div style="padding-top: 125px;">
                                                <label class="control-label col-md-4">* Margen</label>
                                                <div class="form-group col-md-8">
                                                    <div class="input-icon right">
                                                        <i name="change_" id="change_margen_ok" style="display:none; color:green;" class="icon-check" data-original-title=""></i>
                                                        <i name="change_x" id="change_margen" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                        <input onkeyup="validate();" required="" type="text" id="margen" name="txt_margen" class="form-control input-circle" placeholder="Margen">
                                                        <span class="help-block" style="font-size:8pt;">EL limite minimo requerido para que el sistema notifique la poca disponibilidad del  producto</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="control-label col-md-4">* Unidad</label>
                                            <div class="form-group col-md-8">
                                                <select required="true" id="select_unidad" name="txt_unidad" class="form-control input-circle">
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <br><br><br><br>
                                            <label class="control-label col-md-5">Articulo Pre-Fabricado</label>
                                            
                                            <div class="form-group col-md-7">
                                                <input id="pre_fab" name="pre_fab" onchange="art_pre();validate();" type="checkbox">
                                                
                                            </div>
                                            <div style="padding-top: 55px;">
                                                <label id="label_desc" class="control-label col-md-3">* Descripción</label>
                                                <div id="change_desc" class="form-group col-md-9">
                                                   
                                                    <textarea required="" id="txt_descripcion" name="txt_descripcion" rows="2" class="form-control input-circle" placeholder="Descripcion del producto"></textarea>
                                                </div>
                                            </div>
                                            
                                            <label class="control-label col-md-3">* Precio</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_precio_ok" style="display:none; color:green;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_precio" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input onkeyup="validate();" onchange="validate();validate_len();" required="" type="text" id="precio" name="txt_precio" class="form-control input-circle" placeholder="Precio del producto">
                                                </div>

                                            </div>
                                            <label class="control-label col-md-3">* SKU</label>
                                            <div class="form-group col-md-9">
                                                <input readonly="" type="text" id="SKU" name="txt_sku" class="form-control input-circle" placeholder="SKU del Producto">
                                            </div>
                                            <label class="control-label col-md-3"> Cantidad</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_cantidad_ok" style="display:none;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_cantidad" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input  onkeyup="validate();" type="text" id="cantidad" name="txt_cantidad" class="form-control input-circle" placeholder="Cantidad del producto">
                                                </div>
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
            
            var $sd = '<?php echo json_encode($sizes_dump); ?>';
            
            var art_pre = function(){

                var check  = $("#pre_fab").prop("checked");
                if(!check){
                    $("#change_desc").html(' <textarea required="" id="txt_descripcion" name="txt_descripcion" rows="2" class="form-control input-circle" placeholder="Descripcion del producto"></textarea>');
                    $("#label_desc").html('* Descripción');
                }
                else
                {
                     var jsd        = JSON.parse($sd);
                     var a          = [];
                     var p          = [];
                     var c          = [];
                     
                     $("#change_desc").html('<input type="text" name="txt_descripcion" id="txt_descripcion" onchange="validate();" class="form-control " value="">');

                     $.map(jsd , function(s){
                         a.push(s.nombre);
                     });
                     
                     for(var i = 0 ; i < 30 ; i++)
                     {
                         var n = i+0.5;
                         p.push(n.toString());
                         c.push(i.toString());
                     }

                     $("#txt_descripcion").select2({ tags: a});
                     $("#precio").select2({ tags : p });
                     $("#cantidad").select2({ tags : c} );
                     $("#label_desc").html('* Tallas');
                     
                }
                
            };
            
            
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

            var validate_cantidad = function () {
                var change_cantidad_ok = $("#change_cantidad_ok");
                var change_cantidad = $("#change_cantidad");
                var cantidad = $("#cantidad").val();
                if (cantidad === "") {
                    change_cantidad_ok.css("display", "none");
                    change_cantidad.css("display", "none");
                    return false;
                }
                else if (isNaN(cantidad) && cantidad !== "") {
                    change_cantidad_ok.css("display", "none");
                    change_cantidad.css("display", "block");
                    return true;
                }
                else {
                    change_cantidad_ok.css("display", "block");
                    change_cantidad.css("display", "none");
                    return false;
                }
            };

            var validate_margen = function () {
                var change_margen_ok = $("#change_margen_ok");
                var change_margen = $("#change_margen");
                var margen = $("#margen").val();
                if (margen === "") {
                    change_margen_ok.css("display", "none");
                    change_margen.css("display", "none");
                    return true;
                }
                else if (isNaN(margen) && margen !== "") {
                    change_margen_ok.css("display", "none");
                    change_margen.css("display", "block");
                    return true;
                }
                else {
                    change_margen_ok.css("display", "block");
                    change_margen.css("display", "none");
                    return false;
                }
            };

           var validate_price = function () {
                var change_precio_ok = $("#change_precio_ok");
                var change_precio = $("#change_precio");
                var precio = $("#precio").val();
                if (precio === "") {
                    change_precio_ok.css("display", "none");
                    change_precio.css("display", "none");
                    return true;

                }
                else if (isNaN(precio) && precio !== "") {
                    change_precio_ok.css("display", "none");
                    change_precio.css("display", "block");
                    return false;
                }
                else {
                    change_precio_ok.css("display", "block");
                    change_precio.css("display", "none");
                    return false;
                }
            };

            var validate = function () {
                var check = $("#pre_fab");
                var change_precio_ok = $("#change_precio_ok");
                var change_precio = $("#change_precio");
                if (check.prop("checked")) {
                     var margen = validate_margen();
                    var tallas = $("#txt_descripcion").val();
                    var precio = $("#precio").val();
                     var counTallas = tallas.split(",");
                    var countPrecio = precio.split(",");

                    if (margen === false &&  tallas !="" && precio !="" && countPrecio.length === counTallas.length) {
                        $('#send').attr("disabled", false);
                        change_precio_ok.css("display", "block");
                        change_precio.css("display", "none");

                    } else {
                        $('#send').attr("disabled", true);
                        change_precio_ok.css("display", "none");
                        change_precio.css("display", "none");
                    }
               }else{
                var precio = validate_price();
                var margen = validate_margen();
                var cantidad = validate_cantidad();

                if (precio === true || margen === true || cantidad === true) {
                    $('#send').attr("disabled", true);
                } else {
                    $('#send').attr("disabled", false);
                }
               };
            };

        </script>