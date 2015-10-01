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
                            <?php
                                
                                 $response = isset($_REQUEST['s']) ? $_REQUEST['s'] : -1;
                                 if($response != -1){
                                     switch($response){
                                         case TRUE:
                                             echo "CLIENTE CREADO CON EXITO ...";
                                             break;
                                         case FALSE:
                                             echo "NO SE PUDO CREAR EL CLIENTE";
                                             break;
                                     }
                                 }
                            ?>
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase">Nuevo Cliente</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <!-- INICIO FORM-->
                            <?php echo form_open_multipart("Client/Add" , array("method" => "post")); ?>
                            <h5 lass="form-section">Los campos con * son Requeridos</h5>
                            <div class="col-md-12">
                                <h3 lass="form-section">Información del cliente</h3><br>
                                <div class="col-md-6">
                                    <br><label class="control-label col-md-4">* Nombre</label>
                                    <div class="form-group col-md-8">
                                        <input autocomplete="off"  required="required" type="text" id="txt1" name="txt_nombre" class="form-control input-circle" placeholder="Nombre del cliente">
                                    </div>
                                    <label class="control-label col-md-4">Tipo</label>
                                    <div class="form-group col-md-8">
                                        <select required="required" id="select_tipo" name="txt_tipo" class="form-control input-circle"> 
                                            <option selected="" value="Persona Natural">Persona Natural</option>
                                            <option value="Persona Juridica">Persona Juridica</option>
                                        </select>                                    
                                    </div>
                                </div>
                                <div class="col-md-6"><div class="visible-lg visible-md"><br></div>
                                    <label class="control-label col-md-4">IVA</label>
                                        <div class="form-group col-md-8">
                                            <div class="input-icon right">
                                                <i name="change_" id="change_iva_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                <i name="change_x" id="change_iva" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                <input autocomplete="off"  type="text" id="txt_iva" name="txt_iva" class="form-control input-circle" placeholder="Numero de IVA">
                                            </div>
                                        </div>
                                    <label class="control-label col-md-4">NIT</label>
                                        <div class="form-group col-md-8">
                                            <div class="input-icon right">
                                                <i name="change_" id="change_nit_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                <i name="change_x" id="change_nit" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                <input autocomplete="off"  type="text" id="txt_nit" name="txt_nit" class="form-control input-circle" placeholder="Numero de NIT">
                                            </div>
                                         </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <h3 lass="form-section">Información de contacto</h3><br>
                                
                                <label class="control-label col-md-4">* Contacto</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <input autocomplete="off"  required="required" type="text" id="txt3" name="txt_contacto" class="form-control input-circle" placeholder="Nombre de Contacto">
                                    </div>
                                </div>
                                <label class="control-label col-md-4">* Telefono</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_telefono_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_telefono" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input autocomplete="off" maxlength="8" onkeyup="validate_telefono();" required="" type="text" id="txt4" name="txt_telefono" class="form-control input-circle" placeholder="Numero de telefono">
                                    </div>
                                </div>
                                <label class="control-label col-md-4">* Celular</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_celular_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_celular" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input autocomplete="off" maxlength="8" onkeyup="validate_celular();" required="" type="text" id="txt5" name="txt_celular" class="form-control input-circle" placeholder="Numero de celular">
                                    </div>
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6 col-sm-12"><div class="visible-lg visible-md"><br><br><br><br></div>
                                
                                <label class="control-label col-md-4">Fax</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_fax_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_fax" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input autocomplete="off" maxlength="8" onkeyup="validate_fax();" type="text" id="txt_fax" name="txt_fax" class="form-control input-circle" placeholder="Numero de fax">
                                    </div>
                                </div>
                                <label class="control-label col-md-4">* Correo</label>
                                <div class="form-group col-md-8">
                                    <div class="input-icon right">
                                        <i name="change_" id="change_correo_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                        <i name="change_x" id="change_correo" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                        <input autocomplete="off" required="" onkeyup="isValidEmail();" type="text" id="txt6" name="txt_correo" class="form-control input-circle" placeholder="Escriba el correo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6 col-sm-12">
                                    <h3 class="form-section">Dirección</h3><br>
                                    <label class="control-label col-md-4">Local</label>
                                    <div class="form-group col-md-8">
                                      <input autocomplete="off" type="text" id="" name="txt_local" class="form-control input-circle" placeholder="Nombre del Local">
                                    </div>
                                    <label class="control-label col-md-4">* Dirección 1</label>
                                    <div class="form-group col-md-8">
                                      <input autocomplete="off"  required="required" type="text" id="txt7" name="txt_direccion" class="form-control input-circle" placeholder="Nombre de la Direccion 1">
                                    </div>
                                    <label class="control-label col-md-4">Dirección 2</label>
                                    <div class="form-group col-md-8">
                                      <input autocomplete="off" type="text" id="" name="txt_direccion2" class="form-control input-circle" placeholder="Nombre de la Direccion 2">
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
                            <h3 class="form-section">Descripción y adjintar archivos</h3><br>
                                <div class="col-md-6">
                                    <label class="control-label col-md-4">Descripci&oacute;n</label>
                                    <div class="form-group col-md-8">
                                        <textarea name="txt_desc" class="form-control input-circle" rows="2" placeholder="Descripción del cliente"></textarea>
                                    </div>
                                </div>
                                <div class="form-group scroller" style="height:200px">
                                    <label class="control-label col-md-4">Adjuntar archivos</label>
                                    <button type="button" id="file_add" class="btn btn-default"><i class="icon-plus"></i></button>
                                    <div id="file_data" class="col-md-8">
                                            <span id="f1" class="btn btn-default ">
                                               <input autocomplete="off" id="files1" name="file[]" type="file">
                                            </span>
                                    </div>
                                </div>
                            </div>      
                                <div class="col-md-12">
                                    <div class="form-actions col-md-offset-9">
                                        <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                                        <button disabled="disabled" id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
                                    </div>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
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
<script>
    var $field_count = 7;
    var $file_count  = 1;
    
    var init_client = function(){

        $("#txt_nit").on("keyup" , function(k){
        var nit = $("#txt_nit").val();
        var change_nit_ok = $("#change_nit_ok");
        var change_nit = $("#change_nit");
        var count = nit.length;

        if (k.key != 'Backspace') {
            switch (count){
                case 4:
                    $("#txt_nit").val(nit + "-");
                    break;
                case 11:
                    $("#txt_nit").val(nit + "-");
                    break;
                case 15 :
                    $("#txt_nit").val(nit + "-");
                    break;
         } }

         if (nit.length < 1) {
            change_nit.css("display", "none");
            change_nit_ok.css("display", "none");

         }else if(nit.length >= 18){
            change_nit_ok.css("display", "none");
            change_nit.css("display", "block");
            return true;
            }
        else if (/^(\d{4})-(\d{6})-(\d{3})-(\d{1})/.test(nit) ) {
            change_nit_ok.css("display", "block");
            change_nit.css("display", "none");
            return true;
        }else {
            change_nit_ok.css("display", "none");
            change_nit.css("display", "block");
            return false;
            }
        });

         $("#txt_iva").on("keyup" , function(k){
                var iva = $("#txt_iva").val();
                var change_iva_ok = $("#change_iva_ok");
                var change_iva = $("#change_iva");
                var count = iva.length;
                if (k.key != 'Backspace') {
                    if (count == 6) {
                        $("#txt_iva").val(iva + "-");
                    };
                }

                if (count < 1) {
                    change_iva_ok.css("display", "none");
                    change_iva.css("display", "none");
                }else if(iva.length >= 9){
                    change_iva_ok.css("display", "none");
                    change_iva.css("display", "block");
                    return true;
                    }
                 else if (/^(\d{6})-(\d{1})/.test(iva) ) {
                    change_iva_ok.css("display", "block");
                    change_iva.css("display", "none");
                    return true;
                }else {
                    change_iva_ok.css("display", "none");
                    change_iva.css("display", "block");
                    return false;
                }
            });
            
         $("#file_add").on("click" , function(){
               $file_count++;
               var data = '<span id="f' 
                       + $file_count 
                       + '" class="btn btn-default "><input id="files' 
                       + $file_count + '" name="file[]" type="file"></span>';
               $("#file_data").prepend(data);
         });
            
 
     };

     var isValidEmail = function () {
        var change_correo_ok = $("#change_correo_ok");
        var change_correo = $("#change_correo");
        var correo = $("#txt6").val();
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(correo) && correo !== "") {
            change_correo_ok.css("display", "block");
            change_correo.css("display", "none");
            return true;
        }else {
            change_correo_ok.css("display", "none");
            change_correo.css("display", "block");
            return false;
        }
    };

    var LoadValidation = function(){
     setInterval(function(){
           var total = 0;
           var correo = isValidEmail();
           for(var i =1; i <= $field_count ; i++)
           {
              total += validar(i);
           }
           if(total == $field_count && correo === true){
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
            $.map(j, function (k) {
                if (k.id == "SV") {
                    c.prepend("<option selected='selected' value='" + k.id + "'>" + k.name + "</option>");
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
        var count = telefono.length;
        if (isNaN(telefono) || telefono == "" || count <=7) {
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
        var count = celular.length;
        if (isNaN(celular) || celular == "" || count <=7) {
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
        var count = fax.length;
        if (count < 1) {
            change_fax_ok.css("display", "none");
            change_fax.css("display", "none");
        }else if (isNaN(fax) || count <=7) {
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

</script>
