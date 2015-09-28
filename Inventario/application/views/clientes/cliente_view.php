
<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">
    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Ver Clientes
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
                    <a href="#">Ver Clientes</a>
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
                            <div class="caption font-green-sharp">
                                <i class="icon-speech font-green-sharp"></i>
                                <span class="caption-subject bold uppercase">ver Cliente</span>
                            </div>
                        </div>
                        <div class="portlet-body">

                            <table class="table table-striped table-hover table-bordered scrille" id="clientes_table">
                                <thead>
                                    <tr>
                                        <th>
                                            <p align="center">Nombre</p>
                                        </th>
                                        <th >
                                            <p align="center">Tipo</p>
                                        </th>
                                        <th >
                                            <p align="center">Contacto</p>
                                        </th>
                                        <th>
                                            <p align="center">Correo</p>
                                        </th>
                                        <th>
                                            <p align="center">Operaciones</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                             if(!is_null($data_client)){
                                                 $data = null;
                                                 foreach($data_client as $c){
                                                     $data .= "<tr id='node_" . $c->id . "'>";
                                                     $data .= "<td><p align='center'>" . $c->nombre  . "</p></td>";
                                                     $data .= "<td><p align='center'>" . $c->tipo  . "</p></td>";
                                                     $data .= "<td><p align='center'>" . $c->contacto  . "</p></td>";
                                                     $data .= "<td><p align='center'>" . $c->email  . "</p></td>";
                                                     $data .= '<td><p align="center"><a onclick="i(' . $c->id . ');" data-toggle="modal" href="#responsive_view"><i class="icon-eye-open" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;';
                                                     if(is_array($operations)){
                                                         $data .= $operations['edit'] == TRUE 
                                                                 ? '<a href="' . site_url("0/clientes=edit_cliente?i=" . $c->id) . '"><i class="icon-pencil" style="font-size: 20px;"></i></i></a>&nbsp;&nbsp;' 
                                                                 : "";
                                                         $data .= $operations['delete'] == TRUE 
                                                                 ? '  <a class="" onclick="i(' . $c->id . ')"  data-toggle="modal" href="#responsive_delete"><i class="icon-trash" style="font-size: 20px;"></i></i></a>' 
                                                                 : '';
                                                         
                                                     }
                                                     $data .= "</p></td>";
                                                     $data .= "</tr>";
                                                 }
                                                 
                                                 echo $data;
                                             }
                                        ?>
                                </tbody>
                            </table>
                            <!-- FINAL FORM-->
                        </div>
                        <div id="responsive_delete" class="modal fade" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Eliminar Cliente</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible1="1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>¿Deseas eliminar este cliente de tu lista?</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                            <button id="delete_client" type="button" data-dismiss="modal" class="btn green">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal fade bs-modal-lg" id="responsive_view" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                        <h4 class="modal-title">Datos generales del cliente</h4>
                                    </div>
                                    <div class="modal-body">
                                         <div class="scroller" style="height:430px;">
                                                <h3 class="form-section">Información del cliente</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nombre:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     Lorena Antonia Peña
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">IVA:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     1234456-1
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Tipo:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     Persona Juridica
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">NIT:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     1234-567894-123-4
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <!--/row-->
                                                <h3 class="form-section">Información de contacto</h3><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Empresa:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     Google Inc.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Celular:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     7845-8754
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Contacto</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     Andrea Pirlo
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">FAX:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     2330-9779
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Teléfono:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     2330-9779
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Correo:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     nlima@lieison.com
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <h3 class="form-section">Dirección</h3><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Local:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                    4512A
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Pais:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     El Salvador
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" style="font-size:13px;">Dirección 1:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     6AV Norte Colonia Escalon
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Departamento:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     2330-9779
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3" style="font-size:13px;">Dirección 2:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     6AV Norte Colonia Escalon
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Ciudad:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                     Ciudad Merliot
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <h3 class="form-section">Descripción y archivos adjuntos</h3><br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Descri´pción del cliente:</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static" style="text-align:justify;">
                                                                    Cliente de san salvador que se dedica a la venta de pc 
                                                                    Cliente de san salvador que se dedica a la venta de pc
                                                                    Cliente de san salvador que se dedica a la venta de pc
                                                                    Cliente de san salvador que se dedica a la venta de pc
                                                                    Cliente de san salvador que se dedica a la venta de pc 
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1">
                                                                            (3) Archivos adjuntos: 
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div style="" id="collapse_3_1" class="panel-collapse collapse in">
                                                                    <div class="panel-body">
                                                                        <p>

                                                                        </p>
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <a href="#">
                                                                                            <img title="" src="<?php echo $route;;?>images/unitee/documents/png.png" style="height:80px;" alt="">
                                                                                        </a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="#">
                                                                                            <img title="" src="<?php echo $route;;?>images/unitee/documents/pdf.png" style="height:80px;" alt="">
                                                                                        </a>
                                                                                    </td>
                                                                                    <td>
                                                                                        <a href="#">
                                                                                            <img title="" src="<?php echo $route;;?>images/unitee/documents/word.png" style="height:80px;" alt="">
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                         </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cerrar</button>
                                    </div>
                                </div>
                            </div>
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
      var $i = null;
      
      var i  = function(n){
           $i = n;
      };
    
      var table_loader = function () {

            var table = $('#clientes_table');

            table.dataTable({
                "lengthMenu": [
                    [5, 15, 30, -1],
                    [5, 10, 30, "Todos"]
                ],
                "pageLength": 4,
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Mostrando _START_ a _END_ en total de _TOTAL_ clientes",
                    "infoEmpty": "No se ha encontrado clientes ...",
                    "infoFiltered": "(filtered1 from _MAX_ total records)",
                    "lengthMenu": "Mostar _MENU_ Clientes",
                    "search": "Buscar:",
                    "zeroRecords": "Ningun producto encontrado ..."

                },
                "columnDefs": [{// set default column settings
                        'orderable': true,
                        'targets': [0]
                    }, {
                        "searchable": true,
                        "targets": [0]
                    }],
                "order": [
                    [0, "asc"]
                ]
            });

            var tableWrapper = $('#clientes_table_wrapper');
            tableWrapper.find('.dataTables_length select').select2();
            
            
            $("#delete_client").on("click" , function(){
                var task = new jtask();
                task.url = "<?php echo site_url("Client/Delete"); ?>";
                task.data = { "i" : $i };
                task.success_callback(function(s){
                    
                });
                task.do_task();
            });


     };
        
     
        
</script>
