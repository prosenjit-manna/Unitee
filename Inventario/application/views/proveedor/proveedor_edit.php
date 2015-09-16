

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
                    <a href="<?php echo site_url("/0/proveedor=view_proveedor"); ?>">Ver Proveedor </a>
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
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase"> EDITAR PROVEEDOR</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="portlet-body form">
                                <!-- INICIO FORM-->
                                <div class="form-body">
                                    <h5 lass="form-section">Los campos con * son Requeridos</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_open("/TheProvider/EditProvider/", array("method" => "post")); ?>
                                            <input type="hidden" name="the_id" id="the_id" value="<?php echo $data->id_prov; ?>" />
                                            <h3 lass="form-section">Información de Contacto</h3><br>
                                            <label class="control-label col-md-3">* Codigo</label>
                                            <div class="form-group col-md-9">
                                                <input value="<?php echo $data->codigo; ?>" disabled="disabled" type="text" id="" name="txt_empresa" class="form-control input-circle" placeholder="">
                                            </div>
                                            <label class="control-label col-md-3">* Empresa</label>
                                            <div class="form-group col-md-9">
                                                <input value="<?php echo $data->empresa; ?>" onkeyup="val();" required="" type="text" id="txt_empresa" name="txt_empresa" class="form-control input-circle" placeholder="">
                                            </div>
                                            <label class="control-label col-md-3">* Contacto</label>
                                            <div class="form-group col-md-9">
                                                <input value="<?php echo $data->contacto_nombre; ?>" onkeyup="val();" required="" type="text" id="txt_contacto" name="txt_contacto" class="form-control input-circle" placeholder="Nombre de Contacto">
                                            </div>
                                            <label class="control-label col-md-3">* Teléfono</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_telefono_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_telefono" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input value="<?php echo $data->contacto_tel1; ?>" onkeyup="validate_telefono();
                                                            val();" required="" type="text" id="txt_telefono" name="txt_telefono" class="form-control input-circle" placeholder="Numero de Telefono">
                                                </div>
                                            </div>
                                            <label class="control-label col-md-3">* Celular</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_celular_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_celular" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input value="<?php echo $data->contacto_tel2; ?>"  onkeyup="validate_celular();
                                                            val();" required="" type="text" id="txt_celular" name="txt_celular" class="form-control input-circle" placeholder="Numero de Celular">
                                                </div>
                                            </div>
                                            <label class="control-label col-md-3">Fax</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_fax_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_fax" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input value="<?php echo $data->contacto_fax; ?>" onkeyup="validate_fax();
                                                        val();" type="text" id="txt_fax" name="txt_fax" class="form-control input-circle" placeholder="Numero de FAX">
                                                </div>
                                            </div>
                                            <label class="control-label col-md-3">* Correo</label>
                                            <div class="form-group col-md-9">
                                                <div class="input-icon right">
                                                    <i name="change_" id="change_correo_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                    <i name="change_x" id="change_correo" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                    <input value="<?php echo $data->contacto_correo; ?>" onkeyup="validate_correo();
                                                        val();" required="" type="text" id="txt_correo" name="txt_correo" class="form-control input-circle" placeholder="Correo Electronico">
                                                </div>
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
                                                <input value="<?php echo $data->dir1; ?>" onkeyup="val();" required="" type="text" id="txt_direccion1" name="txt_direccion1" class="form-control input-circle" placeholder="Nombre de la Direccion 1">
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
                                            <input value="<?php echo $data->descripcion; ?>" type="text" id="txt_descripcion" name="txt_descripcion" style="height:125px;" class="form-control input-circle" placeholder="No hay descri´pción del proveedor">
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


            var load_paises = function () {
                var tasking = new jtask();
                tasking.url = "<?php echo site_url("/c/2"); ?>";
                tasking.success_callback(function (data) {
                    var j = JSON.parse(data);
                    var c = $("#select_country");
                    c.html("");
                    var iso = "<?php echo $data->pais_iso; ?>";
                    $.map(j, function (k) {

                        if (k.id == iso) {
                            c.prepend("<option value='" + k.id + "'>" + k.name + "</option>");
                            get_depto(k.id);
                        }
                        else {
                            c.append("<option value='" + k.id + "'>" + k.name + "</option>");
                        }
                    });
                });
                tasking.do_task();
            };


            var get_depto = function (iso) {
                var tasking = new jtask();
                tasking.url = "<?php echo site_url("/country/GetDepto/"); ?>";
                tasking.data = {"iso": iso};

                tasking.success_callback(function (data) {
                    var c = $("#select_depto");
                    c.html("");
                    c.append('<option >Elige un Departamento</option>');
                    var j = JSON.parse(data);
                    var id = "<?php echo $data->depto_codigo; ?>";
                    $.map(j, function (k) {
                        if (k.id == id) {
                            c.append('<option selected="selected" value="' + k.id + '">' + k.name + '</option>');
                            get_municipio(k.id);
                        }
                        else
                            c.append('<option value="' + k.id + '">' + k.name + '</option>');
                    });
                });
                tasking.do_task();
            };

            var get_municipio = function (id) {
                var tasking = new jtask();
                tasking.url = "<?php echo site_url("/country/GetMunicipio/"); ?>";
                //Direccion del controlador donde se obtiene los datos
                tasking.data = {"id": id};
                tasking.success_callback(function (data) {
                    //tasking libreria de rolando para hacer procesos de segundo plano
                    var ciu = $("#select_city");
                    //seleccion del id del select donde se desean mostrar los datos
                    ciu.html("");
                    //html para cambiar algo del en una etiqueta html reemplazando la anterior
                    ciu.append('<option selected="selected">Elige una Ciudad</option>');
                    //para mandar como lista
                    var j = JSON.parse(data);
                    //JSON Parse para transformar un elemento json a un objeto

                    var id = "<?php echo $data->municipio_codigo; ?>";


                    $.map(j, function (k) {
                        if (id == k.id)
                            ciu.append('<option selected="selected" value="' + k.id + '">' + k.name + '</option>');
                        else
                            ciu.append('<option value="' + k.id + '">' + k.name + '</option>');
                    });
                });
                tasking.do_task();
            };

            var validate_telefono = function () {
                var change_telefono_ok = $("#change_telefono_ok");
                var change_telefono = $("#change_telefono");
                var telefono = $("#txt_telefono").val();
                if (telefono === "") {
                    change_telefono_ok.css("display", "none");
                    change_telefono.css("display", "none");
                    return true;
                }
                else if (isNaN(telefono) && telefono !== "") {
                    change_telefono_ok.css("display", "none");
                    change_telefono.css("display", "block");
                    return true;
                }
                else {
                    change_telefono_ok.css("display", "block");
                    change_telefono.css("display", "none");
                    return false;
                }
            };

            var validate_celular = function () {
                var change_celular_ok = $("#change_celular_ok");
                var change_celular = $("#change_celular");
                var celular = $("#txt_celular").val();
                if (celular === "") {
                    change_celular_ok.css("display", "none");
                    change_celular.css("display", "none");
                    return true;
                }
                else if (isNaN(celular) && celular !== "") {
                    change_celular_ok.css("display", "none");
                    change_celular.css("display", "block");
                    return true;
                }
                else {
                    change_celular_ok.css("display", "block");
                    change_celular.css("display", "none");
                    return false;
                }
            };

            var validate_fax = function () {
                var change_fax_ok = $("#change_fax_ok");
                var change_fax = $("#change_fax");
                var fax = $("#txt_fax").val();
                if (fax === "") {
                    change_fax_ok.css("display", "none");
                    change_fax.css("display", "none");
                    return true;
                }
                else if (isNaN(fax) && fax !== "") {
                    change_fax_ok.css("display", "none");
                    change_fax.css("display", "block");
                    return true;
                }
                else {
                    change_fax_ok.css("display", "block");
                    change_fax.css("display", "none");
                    return false;
                }
            };

            var validate_correo = function () {
                var change_correo_ok = $("#change_correo_ok");
                var change_correo = $("#change_correo");
                var correo = $("#txt_correo").val();
                if (correo === "") {
                    change_correo_ok.css("display", "none");
                    change_correo.css("display", "none");
                    return true;
                }
                else if (isValidEmail(correo) && correo !== "") {
                    change_correo_ok.css("display", "block");
                    change_correo.css("display", "none");
                    return true;
                }
                else {
                    change_correo_ok.css("display", "none");
                    change_correo.css("display", "block");
                    return false;
                }
            };


            function val() {

                var empresa = $("#txt_empresa").val();
                var contacto = $("#txt_contacto").val();
                var telefono = $("#txt_telefono").val();
                var celular = $("#txt_celular").val();
                var correo = $("#txt_correo").val();
                var dir = $("#txt_direccion1").val();
                var ciudad = $("#select_city").val();

                if (empresa == ""
                        || contacto == ""
                        || telefono == ""
                        || celular == ""
                        || dir == ""
                        || ciudad == "-1"
                        || !isValidEmail(correo)) {
                    document.getElementById("send").disabled = true;
                }
                else {
                    document.getElementById("send").disabled = false;
                }
            }
            ;

            function load() {
                document.getElementById("send").disabled = true;
            }
            ;

            function isValidEmail(mail)
            {

                return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);

            }
        </script>