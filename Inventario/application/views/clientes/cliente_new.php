<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Nuevo Cliente
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
                    <a href="#">Nuevo Cliente</a>
                </li>
            </ul>
            <div class="page-toolbar">

            </div>
        </div>
        <!-- FINAL BREADCUMBS -->

        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">

            <!-- INICIO PAGE CONTENT-->
            <div class="row scroller" style="height:430px" data-rail-visible="1" >
                <!-- INICIO Portlet PORTLET-->
                <div class="portlet">  
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase">Nuevo Cliente</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- INICIO FORM-->
                            <h5 lass="form-section">Los campos con * son Requeridos</h5>
                            <div class="col-md-12">
                                <br><label class="control-label col-md-2">* Nombre del cliente</label>
                                <div class="form-group col-md-10">
                                    <input  required="required" type="text" id="txt1" name="txt_empresa" class="form-control input-circle" placeholder="Escriba el nombre del cliente">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h3 lass="form-section">Información de Contacto</h3><br>
                                <label class="control-label col-md-4">* Empresa</label>
                                <div class="form-group col-md-8">
                                    <input  required="required"  type="text" id="txt2" name="txt_empresa" class="form-control input-circle" placeholder="Nombre de la Empresa">
                                </div>
                                <label class="control-label col-md-4">* Contacto</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <input  required="required" type="text" id="txt3" name="txt_contacto" class="form-control input-circle" placeholder="Nombre de Contacto">
                                    </div>
                                </div>
                                <label class="control-label col-md-4">* Telefono</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_telefono_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_telefono" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input onkeyup="validate_telefono();" required="" type="text" id="txt4" name="txt_telefono" class="form-control input-circle" placeholder="Numero de telefono">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6 col-sm-12"><div class="visible-lg visible-md"><br><br><br><br></div>
                                <label class="control-label col-md-4">* Celular</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_celular_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_celular" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input onkeyup="validate_celular();" required="" type="text" id="txt5" name="txt_celular" class="form-control input-circle" placeholder="Numero de celular">
                                    </div>
                                </div>
                                <label class="control-label col-md-4">Fax</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_fax_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_fax" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input onkeyup="validate_fax();" type="text" id="txt6" name="txt_fax" class="form-control input-circle" placeholder="Numero de fax">
                                    </div>
                                </div>
                                <label class="control-label col-md-4">* Correo</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_correo_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_correo" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input onkeyup="validate_correo();" required="" type="text" id="txt7" name="txt_correo" class="form-control input-circle" placeholder="Numero de correo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6 col-sm-12">
                                    <h3 class="form-section">Dirección</h3><br>
                                    <label class="control-label col-md-4">Local</label>
                                    <div class="form-group col-md-8">
                                      <input type="text" id="" name="txt_local" class="form-control input-circle" placeholder="Nombre del Local">
                                    </div>
                                    <label class="control-label col-md-4">* Dirección 1</label>
                                    <div class="form-group col-md-8">
                                      <input  required="required" type="text" id="txt9" name="txt8" class="form-control input-circle" placeholder="Nombre de la Direccion 1">
                                    </div>
                                    <label class="control-label col-md-4">Dirección 2</label>
                                    <div class="form-group col-md-8">
                                      <input type="text" id="" name="txt_direccion2" class="form-control input-circle" placeholder="Nombre de la Direccion 2">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12"><div class="visible-lg visible-md"><br><br><br><br></div>
                                    <label class="control-label col-md-4">* Pais</label>
                                    <div class="form-group col-md-8">
                                        <select required="required" id="select_country" onchange="get_depto(this.value);" name="txt_pais" class="form-control input-circle">                     
                                        </select>
                                    </div>
                                    <label class="control-label col-md-4">* Departamento</label>
                                    <div class="form-group col-md-8">
                                        <select onchange="get_municipio(this.value);" id="select_depto" name="txt_depto" class="form-control input-circle">                        
                                        </select>
                                    </div>
                                    <label class="control-label col-md-4">* Ciudad</label>
                                    <div class="form-group col-md-8">
                                        <select id="select_city" class="form-control input-circle" name="txt_ciudad">                          
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6 col-sm-12">
                                    <h3 lass="form-section">Descripci&oacute;n</h3><br>
                                    <label class="control-label col-md-4">Descripci&oacute;n del cliente</label>
                                    <div class="form-group col-md-8">
                                        <textarea class="form-control input-circle" rows="3" placeholder="Descripción del cliente"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6"><div class="visible-lg visible-md"><br><br><br><br></div>
                                    <label class="control-label col-md-1">Tipo</label>
                                    <div class="form-group col-md-5">
                                        <select required="required" id="select_tipo" name="txt_tipo" class="form-control input-circle"> 
                                            <option value="-1">Seleccionar opción</option>
                                            <option value="1">Persona Natural</option>
                                            <option value="2">Persona Juridica</option>
                                        </select>                                    
                                    </div>
                                     <label class="control-label col-md-1">IVA</label>
                                    <div class="form-group col-md-5">
                                        <div class="input-icon right">
                                            <i name="change_" id="change_iva_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                            <i name="change_x" id="change_iva" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                            <input onkeyup="validate_iva();" required="" type="text" id="txt_iva" name="txt_iva" class="form-control input-circle" placeholder="Numero de iva">
                                        </div>
                                    </div>
                                    <label class="control-label col-md-1">NIT</label>
                                    <div class="form-group col-md-11">
                                        <div class="input-icon right">
                                            <i name="change_" id="change_nit_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                            <i name="change_x" id="change_nit" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                            <input onkeyup="validate_nit();" required="" type="text" id="txt_nit" name="txt_nit" class="form-control input-circle" placeholder="Numero de nit">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row col-md-12">
                                            <?php
                                            echo form_open_multipart("", array(
                                                "id" => "fileupload",
                                                "class" => "col-md-12"
                                            ));
                                            ?>

                                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                            <div class="row fileupload-buttonbar">
                                                <br><br>
                                                <div class="col-md-3">
                                                    <h4>Adjuntar archivos</h4>
                                                </div>
                                                <div>
                                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                                    <span class="btn default fileinput-button">
                                                        <i class="glyphicon glyphicon-paperclip"></i>
                                                        <span>
                                                            Añadir..</span>
                                                        <input type="file" name="files[]" multiple="">
                                                    </span>
                                                    <button type="submit" class="btn blue start">
                                                        <i class="glyphicon glyphicon-upload"></i>
                                                        <span>
                                                            Subir</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- The table listing the files available for upload/download -->
                                            <table role="presentation" class="col-md-4 table table-striped clearfix">
                                                <tbody class="files">
                                                </tbody>
                                            </table>
                                            <input type="hidden" value="" name="directory" />
                                            <?php echo form_close(); ?>
                                    </div>          
                                <div class="col-md-12">
                                    <div class="form-actions col-md-offset-9">
                                        <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                                        <button disabled="disabled" id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
                                    </div>
                                </div>
                            </div>
                            <!-- FINAL FORM-->
                        </div>
                        <!-- FINAL Portlet PORTLET-->
                    </div>

                    <!-- FINAL PAGE CONTENTENIDO-->
                </div>
            </div>
            <!-- FINAL ESTILOS DE LA BARRA -->
        </div>
    </div>
</div>
<!-- FINAL CONTENIDO -->
<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade col-md-6">
    <td>
    <span class="preview"></span>
    </td>
    <td>
    <p class="name">{%=file.name%}</p>
    <strong class="error text-danger"></strong>
    </td>
    <td>
    <p class="size">Processing...</p>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
    </td>
    <td>
    {% if (!i && !o.options.autoUpload) { %}
    <button style="display:none;" class="btn btn-primary start" disabled="disabled">
    </button>
    {% } %}
    {% if (!i) { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade col-md-6">
    <td>
    <span class="preview">
    {% if (file.thumbnailUrl) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
    {% } else { %}
    <span>{%=file.name%}</span>
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    <span class="size">{%=o.formatFileSize(file.size)%}</span>
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="glyphicon glyphicon-trash"></i>
    <span>Delete</span>
    </button>
    <input type="checkbox" name="delete" value="1" class="toggle">
    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>

<script>

    var $field_count = 9;
  
  var LoadValidation = function(){

     setInterval(function(){
           var total = 0;
           for(var i =1; i <= $field_count ; i++)
           {
              total += validar(i);
           }
           if(total == $field_count){
               $("#send").attr("disabled" , false);
           }else{
                $("#send").attr("disabled" , true);
           }

        } , 500);

  };

  var validar = function(field){
            var data = $("#txt" + field).val();
            if(data == '') return 0;
            return 1;
   };

    var load_paises = function () {
        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/c/2"); ?>";
        tasking.success_callback(function (data) {
            var j = JSON.parse(data);
            var c = $("#select_country");
            c.html("");
            //c.append('<option selected="selected">Elige un Pais</option>');
            $.map(j, function (k) {
                if (k.id == "SV") {
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
            c.append('<option selected="selected">Elige un Departamento</option>');
            var j = JSON.parse(data);
            $.map(j, function (k) {
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
            ciu.append('<option selected="selected" value="-1">Elige una Ciudad</option>');
            //para mandar como lista
            var j = JSON.parse(data);
            //JSON Parse para transformar un elemento json a un objeto
            $.map(j, function (k) {
                ciu.append('<option value="' + k.id + '">' + k.name + '</option>');
            });
        });
        tasking.do_task();
    };


    var validate_telefono = function () {
        var change_telefono_ok = $("#change_telefono_ok");
        var change_telefono = $("#change_telefono");
        var telefono = $("#txt4").val();
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
        var celular = $("#txt5").val();
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
        var fax = $("#txt6").val();
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
        var correo = $("#txt7").val();
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

     var validate_iva = function () {
        var change_iva_ok = $("#change_iva_ok");
        var change_iva = $("#change_iva");
        var iva = $("#txt_iva").val();
        if (iva === "") {
            change_iva_ok.css("display", "none");
            change_iva.css("display", "none");
            return true;
        }
        else if (isNaN(iva) && iva !== "") {
            change_iva_ok.css("display", "none");
            change_iva.css("display", "block");
            return true;
        }
        else {
            change_iva_ok.css("display", "block");
            change_iva.css("display", "none");
            return false;
        }
    };

     var validate_nit = function () {
        var change_nit_ok = $("#change_nit_ok");
        var change_nit = $("#change_nit");
        var nit = $("#txt_nit").val();
        if (nit === "") {
            change_nit_ok.css("display", "none");
            change_nit.css("display", "none");
            return true;
        }
        else if (isNaN(nit) && nit !== "") {
            change_nit_ok.css("display", "none");
            change_nit.css("display", "block");
            return true;
        }
        else {
            change_iva_ok.css("display", "block");
            change_iva.css("display", "none");
            return false;
        }
    };


    function isValidEmail(mail){
        return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
    };

    var FormFileUpload = function () {
        return {
            //main function to initiate the module
            init: function () {
                // Initialize the jQuery File Upload widget:
                $('#fileupload').fileupload({
                    disableImageResize: false,
                    autoUpload: false,
                    disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
                            maxFileSize: 5000000,
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|png|doc|docx|pdf|txt|xls|pst)$/i
                            // Uncomment the following to send cross-domain cookies:
                            //xhrFields: {withCredentials: true},                
                });
                // Enable iframe cross-domain access via redirect option:
                $('#fileupload').fileupload(
                        'option',
                        'redirect',
                        window.location.href.replace(
                                /\/[^\/]*$/,
                                '/cors/result.html?%s'
                                )
                        );
                // Upload server status check for browsers with CORS support:
                if ($.support.cors) {
                    $.ajax({
                        type: 'HEAD'
                    }).fail(function () {
                        alert();
                        $('<div class="alert alert-danger"/>')
                                .text('Upload server currently unavailable - ' +
                                        new Date())
                                .appendTo('#fileupload');
                    });
                }
                $.ajax({
                    url: $('#fileupload').attr("action"),
                    dataType: 'json',
                    context: $('#fileupload')[0]
                }).always(function () {
                    $(this).removeClass('fileupload-processing');
                })
                        .done(function (result) {
                            // $(this).fileupload('option', 'done')
                            // .call(this, $.Event('done'), {result: result});
                        });

                // Load & display existing files:
                $('#fileupload').addClass('fileupload-processing');
            }
        };
    }();
</script>