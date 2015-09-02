<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">

    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Nueva Compra
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
                    <a href="#">Nueva Compra</a>
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
                            <span class="caption-subject bold uppercase">Nueva Compra</span>
                        </div>
                    </div>
                           <div class="row col-md-12">
                                <div class="col-md-6"><br><br><br>
                                   <label class="control-label col-md-3">* Proveedor</label>
                                   <div class="form-group col-md-7">
                                       <select required="" id="select_colors" name="txt_color" class="form-control input-circle">
                                           <option value="">Seleccione un proveedor</option>
                                       </select>
                                   </div>
                                   <a href="<?php echo site_url("/0/proveedor=new_proveedor"); ?>" class="col-md-1 btn btn-default"><span style="font-size:14px;" class="glyphicon glyphicon-plus-sign"></span></a>
                               </div>
                               <div class="well col-md-6">
                                    <h4 class="col-md-12">Dirección</h4>
                                    <p>
                                            San Salvador, Calle ..........  etc etc
                                    </p>
                                    <h4 class="col-md-6">Nombre</h4>
                                    <h4 class="col-md-6">Telefono</h4>
                                    <p class="col-md-6">
                                            Juan Pedro Pablo Leon
                                    </p>
                                    <p class="col-md-6">
                                            777-5698
                                    </p>
                                    
                               </div>
                           </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn green">
                                            Add New <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;">
                                                    Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                    Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                    Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                            <tr>
                                <th>
                                     Username
                                </th>
                                <th>
                                     Full Name
                                </th>
                                <th>
                                     Points
                                </th>
                                <th>
                                     Notes
                                </th>
                                <th>
                                     Edit
                                </th>
                                <th>
                                     Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                     alex
                                </td>
                                <td>
                                     Alex Nilson
                                </td>
                                <td>
                                     1234
                                </td>
                                <td class="center">
                                     power user
                                </td>
                                <td>
                                    <a class="edit" href="javascript:;">
                                    Edit </a>
                                </td>
                                <td>
                                    <a class="delete" href="javascript:;">
                                    Delete </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     lisa
                                </td>
                                <td>
                                     Lisa Wong
                                </td>
                                <td>
                                     434
                                </td>
                                <td class="center">
                                     new user
                                </td>
                                <td>
                                    <a class="edit" href="javascript:;">
                                    Edit </a>
                                </td>
                                <td>
                                    <a class="delete" href="javascript:;">
                                    Delete </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     nick12
                                </td>
                                <td>
                                     Nick Roberts
                                </td>
                                <td>
                                     232
                                </td>
                                <td class="center">
                                     power user
                                </td>
                                <td>
                                    <a class="edit" href="javascript:;">
                                    Edit </a>
                                </td>
                                <td>
                                    <a class="delete" href="javascript:;">
                                    Delete </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     goldweb
                                </td>
                                <td>
                                     Sergio Jackson
                                </td>
                                <td>
                                     132
                                </td>
                                <td class="center">
                                     elite user
                                </td>
                                <td>
                                    <a class="edit" href="javascript:;">
                                    Edit </a>
                                </td>
                                <td>
                                    <a class="delete" href="javascript:;">
                                    Delete </a>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                         <div class="row col-md-12">
                            <!--
                                 <div class="col-md-7"><br>
                                    <form id="fileupload" action="<?php echo $route;?>assert/plugins/jquery-file-upload/server/php/" method="POST" enctype="multipart/form-data">
                                        <div class="row fileupload-buttonbar">
                                            <div class="col-lg-7">
                                                <span class="btn green fileinput-button">
                                                <i class="glyphicon glyphicon-plus-sign"></i>
                                                <span>
                                                Agregar </span>
                                                <input type="file" name="files[]" multiple="">
                                                </span>
                                                <button type="submit" class="btn blue start">
                                                <i class="glyphicon glyphicon-upload"></i>
                                                <span>
                                                Subir </span>
                                                </button>
                                                <button type="reset" class="btn warning cancel">
                                                <i class=""></i>
                                                <span>
                                                Cancelar</span>
                                                </button>
                                                <span class="fileupload-process">
                                                </span>
                                            </div>
            
                                            <div class="col-lg-5 fileupload-progress fade">
                        
                                                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-success" style="width:0%;">
                                                    </div>
                                                </div>
                
                                                <div class="progress-extended">
                                                     &nbsp;
                                                </div>
                                            </div>
                                        </div>
        
                                        <table role="presentation" class="table table-striped clearfix">
                                        <tbody class="files">
                                        </tbody>
                                        </table>
                                    </form> 
                               </div>
                               -->
                               <div class="col-md-7">
                                    <h4>Adjuntar</h4>
                                    <form action="generados/index.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input id="archivo" name="archivo" type="file" class="file" multiple=true data-preview-file-type="any" class="form-group"required>
                                        </div>
                                    </form>
                                </div>
                               <div class="col-md-5"><br><br>
                                    <label class="control-label col-md-3">* P.O </label>
                                   <div class="form-group col-md-9">
                                        <input onkeyup="validar();" type="text" name="txt_po" id="txt_po" value="" class="form-control input-circle" placeholder="Orden de compra">
                                   </div>
                                    <label class="control-label col-md-3">* Factura</label>
                                   <div class="form-group col-md-9">
                                        <input onkeyup="validar();" type="text" name="txt_factura" id="txt_factura" value="" class="form-control input-circle" placeholder="Factura">
                                   </div>
                                   <label class="control-label col-md-3">* Precio</label>
                                    <div class="form-group col-md-9">
                                            <div class="input-icon right">
                                                <i name="change_" id="change_ptotal_ok" style="display:none;color:#01DF3A;" class="icon-check" data-original-title=""></i>
                                                <i name="change_x" id="change_ptotal" style="display:none;color:#f3565d;" class="icon-close" data-original-title=""></i>
                                                <input onkeyup="validate_ptotal();validar();" required="" type="text" id="txt_ptotal" name="txt_ptotal" class="form-control input-circle" placeholder="Numero de ptotal">
                                            </div>
                                    </div>
                               </div>
                            
                           </div><br><br>
                           <div class="form-actions right col-md-offset-10">
                                    <a href="<?php echo site_url("/0/"); ?>" class="btn default">Cancelar</a>
                                    <button disabled="disabled" id="send" name="send"  type="submit" class="btn blue"><i class="fa fa-check"></i>Guardar</button>
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
<!--FIN DEL CONTENIDO-->
<!--Validaciones-->
<script>
    var validate_ptotal = function () {
                var change_ptotal_ok = $("#change_ptotal_ok");
                var change_ptotal = $("#change_ptotal");
                var ptotal = $("#txt_ptotal").val();
                if (ptotal ==="") {
                change_ptotal_ok.css("display", "none");
                change_ptotal.css("display", "none");
                 return true ;
                 }
                else if (isNaN(ptotal) && ptotal !=="") {
                change_ptotal_ok.css("display", "none");
                change_ptotal.css("display", "block");
                return true ;
                }
                else {
                change_ptotal_ok.css("display", "block");
                change_ptotal.css("display", "none");
                return false ;
               }
            };


    function validar() {

                var po = $("#txt_po").val();
                var factura = $("#txt_factura").val();
                var preciot = $("#txt_ptotal").val();

                if (po == "" 
                        || factura == "" 
                        || preciot == "") {
                    document.getElementById("send").disabled = true;
                }
                else {
                    document.getElementById("send").disabled = false;
                }
            };

</script>
<!--Validaciones-->
<!--
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger label label-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
            </div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn blue start" disabled>
                    <i class="fa fa-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn red cancel">
                    <i class="fa fa-ban"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
 The template to display files available for download 
<script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
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
                        <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="fa fa-trash-o"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" name="delete" value="1" class="toggle">
                    {% } else { %}
                        <button class="btn yellow cancel btn-sm">
                            <i class="fa fa-ban"></i>
                            <span>Cancel</span>
                        </button>
                    {% } %}
                </td>
            </tr>
        {% } %}
    </script>-->