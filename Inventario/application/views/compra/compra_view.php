<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Ver Compras
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
                    <a href="#">Ver Compras</a>
                </li>
            </ul>
        </div>
        <!-- FINAL BREADCUMBS -->
        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <!-- INICIO PAGE CONTENT-->
            <!-- INICIO Portlet PORTLET-->
            <div class="portlet scroller" style="height:440px;" data-rail-visible="1">  
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="portlet-title caption font-green-sharp">
                            <i class="icon-speech font-green-sharp"></i>
                            <span class="caption-subject bold uppercase">Ver Compras</span>
                        </div>
                    </div>
                    <div class="row col-md-12">
                        <div class="col-md-4">
                            <div class="portlet light bordered col-md-12"><br>
                                <label class="control-label col-md-3">Ver</label>
                                <div class="form-group dropdown col-md-9">
                                    <select id="find_option"  required="required" id="select" onchange="" style="width:165px;" name="txt_pais" class="form-control">
                                        <option value="-1">Seleccionar opción</option>
                                        <option value="1">P.O.</option>
                                        <option value="2">Factura</option>
                                        <option value="3">Producto</option>                     
                                    </select>
                                </div><br><br>
                                <label class="control-label col-md-3">Valor</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input id="txt_find" type="text" class="form-control" style="width:125px;" placeholder="Valor">
                                        <span class="input-group-btn">
                                            <button name="button_find" id="button_find" class="btn btn-info" type="button"><i class="icon-search"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light bordered col-md-12">
                                <div align="center">
                                    <div class="input-group input-medium date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                        <input type="text" class="form-control" name="from">
                                        <span class="input-group-addon">
                                            Hasta</span>
                                        <input type="text" class="form-control" name="to">
                                    </div>
                                    <!-- /input-group -->
                                    <span class="help-block">
                                        Seleccione el rango de fecha </span>
                                </div>
                                <div class="col-md-12" align="center">
                                    <div class="date-picker" data-date-format="mm/dd/yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class="portlet light bordered col-md-12">
                                <ul class="list-group  scroller" style="height:160px">
                                    <li class="list-group-item">
                                        <a href="#" style="text-decoration:none; color:black;">Compra de tela</a><span class="badge badge-margine">
                                            1/09/2015 </span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" style="text-decoration:none; color:black;">Compra de boto..</a><span class="badge badge-margine">
                                            10/09/2015 </span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" style="text-decoration:none; color:black;">Compra de pellum</a><span class="badge badge-margine">
                                            20/20/2015 </span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="#" style="text-decoration:none; color:black;">Compra de Elastico</a><span class="badge badge-margine">
                                            20/20/2015 </span>
                                    </li>
                                     <li class="list-group-item">
                                        <a href="#" style="text-decoration:none; color:black;">Compra de Elastico</a><span class="badge badge-margine">
                                            25/20/2015 </span>
                                    </li>
                                     <li class="list-group-item">
                                        <a href="#" style="text-decoration:none; color:black;">Compra de Elastico</a><span class="badge badge-margine">
                                            20/20/2015 </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                                
                                <div class="col-md-12">
                                    <h4 class="col-md-3">Exportar a:</h4>
                                    <a href="#" class="btn btn-success glyphicon glyphicon-file"> PDF</a>
                                    <a href="#" class="btn btn-success glyphicon glyphicon-print"> Imprimir</a>
                                    <a href="#" class="btn btn-success glyphicon glyphicon-list-alt"> Excel</a>
                                </div><br><br>
                                <div class="portlet light bordered col-md-12">
                                    <ul class="list-group col-md-12">
                                        <li class="list-group-item">
                                            <p class="col-md-4">Número de compra</p>     
                                            <p class="col-md-2">COM-12</p>
                                            <p class="col-md-4">Fecha de compra</p>     
                                            <p class="col-md-1">12/12/12</p><br>
                                        </li>
                                    </ul>
                                    <table class="table table-striped table-hover table-bordered" id="compras_table">
                                        <thead>
                                            <tr>
                                                <th>
                                        <p align="center">Nombre</p>
                                        </th>
                                        <th >
                                        <p align="center">Cantidad</p>
                                        </th>
                                        <th >
                                        <p align="center">Precio</p>
                                        </th>
                                        <th>
                                        <p align="center">Color</p>
                                        </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <p align="center">Tela</p>
                                                </td>
                                                <td>
                                                    <p align="center">199 yds</p>
                                                </td>
                                                <td>
                                                    <p align="center">$21.12</p>
                                                </td>
                                                <td>
                                                    <p align="center">Rojo</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p align="center">Tela</p>
                                                </td>
                                                <td>
                                                    <p align="center">199 yds</p>
                                                </td>
                                                <td>
                                                    <p align="center">$21.12</p>
                                                </td>
                                                <td>
                                                    <p align="center">Rojo</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p align="center">Tela</p>
                                                </td>
                                                <td>
                                                    <p align="center">199 yds</p>
                                                </td>
                                                <td>
                                                    <p align="center">$21.12</p>
                                                </td>
                                                <td>
                                                    <p align="center">Rojo</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p align="center">Tela</p>
                                                </td>
                                                <td>
                                                    <p align="center">199 yds</p>
                                                </td>
                                                <td>
                                                    <p align="center">$21.12</p>
                                                </td>
                                                <td>
                                                    <p align="center">Rojo</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <ul class="list-group col-md-12">
                                        <li class="list-group-item">
                                            <p class="col-md-5">Precio total de la compra</p>     
                                            <p class="col-md-3">$250.00</p>
                                            <p class="col-md-2">P.O.</p>     
                                            <p class="col-md-2">$250.00</p><br>
                                        </li>
                                    </ul>
                                <a data-toggle="modal" href="#responsive_delete" class="btn btn-danger glyphicon glyphicon-remove-circle"> Eliminar</a>
                                </div>
                                <div class="portlet-body">
                                    <div class="panel-group accordion" id="accordion3">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                                Archivos adjuntos: </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_3_1" class="panel-collapse in">
                                                <div class="panel-body">
                                                    <p>
                                                   <table>
                                                   <tr>
                                                       <td>
                                                            <a href="#"><img src="<?php echo $route;?>images/unitee/png.png" style="height:80px;" alt=""></a>
                                                       </td>
                                                       <td>
                                                            <a href="#"><img src="<?php echo $route;?>images/unitee/jpg.png" style="height:80px;" alt=""></a>
                                                       </td>
                                                       <td>
                                                            <a href="#"><img src="<?php echo $route;?>images/unitee/gif.png" style="height:80px;" alt=""></a>
                                                       </td>
                                                       <td>
                                                            <a href="#"><img src="<?php echo $route;?>images/unitee/txt.png" style="height:80px;" alt=""></a>
                                                       </td>
                                                       <td>
                                                            <a href="#"><img src="<?php echo $route;?>images/unitee/word.png" style="height:80px;" alt=""></a>
                                                       </td>
                                                       <td>
                                                            <a href="#"><img src="<?php echo $route;?>images/unitee/excel.png" style="height:80px;" alt=""></a>
                                                       </td>
                                                       <td>
                                                            <a href="#"><img src="<?php echo $route;?>images/unitee/pdf.png" style="height:80px;" alt=""></a>
                                                       </td>
                                                   </tr>
                                                   </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Eliminar Compra</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>¿Deseas eliminar esta compra?</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var $id = null;
    
    var buy_loader = function(){
    
           /**
                * VALUES : 
                * NULL      = -1
                * P.O       = 1
                * FACTURA   = 2
                * PRODUCTO  = 3
                * DATE = 4
                * DATE RANGE = 5
                * **/
        
           $("#button_find").on("click" , function(){
              
                var option_  = $("#find_option").val();
                var value    = $("#txt_find").val();
                
                find_(option_ , value , 0 , "button_find");
                
            });

    };
    
    
    var find_ = function(option , value , range , request)
    {
        
               var task     = new jtask();
               task.url = "<?php echo site_url("Buy/Data"); ?>";
               
               task.data =  {
                   "option": option,
                   "value" : value,
                   "range" : range
               }; 
               
               task.beforesend = true;
               
               task.config_before(function(){
                      $("#button_find").attr("disabled" , true);
               });
               task.success_callback(function(v){
                      // $("#button_find").attr("disabled" , false);
               });
               task.do_task();
    };


  
    
   

</script>