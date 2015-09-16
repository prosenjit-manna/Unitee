<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->

        <!--
       <div class="alert alert-block alert-success fade in">
           <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true">
           </button><p>Producto Editado con Exito</p>
       </div>
        <div class="alert alert-block alert-danger fade in">
           <button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true">
           </button><p>No se pudo editar el producto,  favor intentar de nuevo.</p>
       </div>
        -->

        <h3 class="page-title">
            Unitee - Editar Producto
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
                    <a href="<?php echo site_url("/0/productos=view_producto"); ?>">Ver Productos</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url("/0/productos=edit_producto"); ?>">Editar Productos</a>
                    <i class="icon-angle-right"></i>
                </li>
            </ul>
            <div class="page-toolbar">               
            </div>
        </div>
        <!-- FINAL BREADCUMBS -->
        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <!-- INICIO PAGE CONTENT-->
            <div class="row scroller" style="height:400px" data-rail-visible="1" >
                <div class="col-md-12">
                    <!-- INICIO Portlet PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject">Editar Producto</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="portlet-body form">
                                <!-- INICIO FORM-->
                                <div class="form-body">
                                    <div class="row">
                                        <h5 lass="form-section">Los campos con * son Requeridos</h5>
                                        <div class="col-md-6">
                                            <h3 lass="form-section">Información del Producto</h3><br>

                                            <?php echo form_open("/Productos/EditProduct/", array("method" => "post")); ?>
                                            <input type="hidden" name="the_id" id="the_id" value="<?php echo $data->id_producto; ?>" />

                                            <label class="control-label col-md-3">* Nombre</label>
                                            <div class="form-group col-md-9">
                                                <input required="" value="<?php echo $data->nombre; ?>" type="text" id="" name="txt_nombre" class="form-control input-circle" placeholder="Nombre del Producto">
                                            </div>
                                            <label class="control-label col-md-3">* Color</label>
                                            <div class="form-group col-md-9">
                                                <select required="" id="select_colors" name="txt_color" class="form-control input-circle"> 

                                                </select>
                                            </div>
                                            <label class="control-label col-md-3">* Margen</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_margen_ok" style="display:none;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_margen" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input onkeyup="validate();" required="" value="<?php echo $data->margen; ?>" type="text" id="margen" name="txt_margen" class="form-control input-circle" placeholder="Margen">
                                                </div>
                                            </div>
                                            <label class="control-label col-md-3">* Unidad</label>
                                            <div class="form-group col-md-9">
                                                <select required="" id="select_unidad" name="txt_unidad" class="form-control input-circle">   

                                                </select>
                                            </div>                                                                   
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <br><br><br><br>
                                            <label class="control-label col-md-3">* Descripción</label>
                                            <div class="form-group col-md-9">
                                                <textarea required="" id="txt_descripcion" name="txt_descripcion" rows="2" class="form-control input-circle" placeholder="Descripcion del producto"><?php echo $data->descripcion; ?></textarea>
                                            </div>
                                            <label class="control-label col-md-3">* SKU</label>
                                            <div class="form-group col-md-9">
                                                <input value="<?php echo $data->sku; ?>" readonly type="text" id="" name="txt_sku" class="form-control input-circle" placeholder="SKU del producto">
                                            </div>
                                            <label class="control-label col-md-3">* Precio</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_precio_ok" style="display:none;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_precio" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>

                                                    <input onkeyup="validate();" required="" type="text" id="precio" value="<?php echo $data->precio_est_unidad; ?>"   name="txt_precio" class="form-control input-circle" placeholder="Precio del Producto">
                                                </div>
                                            </div>
                                            <label class="control-label col-md-3">* Cantidad</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_cantidad_ok" style="display:none;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_cantidad" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>

                                                    <input onkeyup="validate();" type="text" id="cantidad" value="<?php echo $data->cantidad; ?>"  name="txt_cantidad" class="form-control input-circle" placeholder="cantidad de Productos">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <a href="<?php echo site_url("/0/productos=view_producto"); ?>" class="btn default">Cancelar</a>
                                        <button  id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
                                    </div>
                                    <?php echo form_close(); ?>						<!-- FINAL FORM-->
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
    </div>
</div>

<script>


    var load_colors = function () {
        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/Productos/get_colors"); ?>";
        tasking.success_callback(function (d) {
            var data = JSON.parse(d);
            var id = "<?php echo $data->id_color; ?>";
            var selected = "";
            $.map(data, function (a) {
                if (id === a.id) {
                    selected = "selected=true";
                }
                else {
                    selected = "";
                }
                $('#select_colors').append("<option " + selected + " value=" + a.id + ">" + a.name + "</option>");
            });
        });
        tasking.do_task();
    };

    var load_unidad = function () {
        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/Productos/get_unidad"); ?>";
        tasking.success_callback(function (d) {
            var data = JSON.parse(d);
            var id = "<?php echo $data->id_unidad; ?>";
            var selected = "";
            $.map(data, function (a) {
                if (id === a.id) {
                    selected = "selected=true";
                }
                else {
                    selected = "";
                }
                $('#select_unidad').append("<option " + selected + " value=" + a.id + ">" + a.name + "</option>");
            });
        });
        tasking.do_task();
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
            return true;
        }
        else {
            change_precio_ok.css("display", "block");
            change_precio.css("display", "none");
            return false;
        }
    };

    var validate = function () {
        var precio = validate_price();
        var margen = validate_margen();
        var cantidad = validate_cantidad();

        if (precio === true || margen === true || cantidad === true) {
            $('#send').attr("disabled", true);
        } else {
            $('#send').attr("disabled", false);
        }
    };


</script>
