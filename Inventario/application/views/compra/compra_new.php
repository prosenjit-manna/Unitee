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
                                            Añadir <i class="fa fa-plus"></i>
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
                                     <p align="center">Nombre</p>
                                </th>
                                <th>
                                     <p align="center">Color</p>
                                </th>
                                <th>
                                     <p align="center">Precio</p>
                                </th>
                                <th>
                                     <p align="center">Cantidad</p>
                                </th>
                                <th>
                                     <p align="center">Operaciones</p>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td align="center">
                                     alex
                                </td>
                                <td align="center">
                                     Alex Nilson
                                </td>
                                <td align="center">
                                     1234
                                </td>
                                <td align="center" class="center">
                                     power user
                                </td>
                                <td align="center">
                               	<p align="center">
									<a class="" data-toggle="modal" href="#"><i class="icon-save" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
									<a href="#"><i class="icon-pencil" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
									<a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></i></a>
								</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                     lisa
                                </td>
                                <td align="center">
                                     Lisa Wong
                                </td>
                                <td align="center">
                                     434
                                </td>
                                <td align="center" class="center">
                                     new user
                                </td>
                                <td align="center">
                                  <p align="center">
									<a class="" data-toggle="modal" href="#"><i class="icon-save" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
									<a href="#"><i class="icon-pencil" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;
									<a class=""   data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></i></a>
								</p>
                                </td>
                            </tr>
                     
                            <tr>
                            </tbody>
                            </table>
                        </div>
                         <div class="row col-md-12">
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
            				<div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Eliminar Compras</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4>¿Deseas eliminar  esta compra?</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                <button type="button" data-dismiss="modal" onclick="delete_provider();" class="btn green">Eliminar</button>
                                            </div>
                                        </div>
                                    </div>
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