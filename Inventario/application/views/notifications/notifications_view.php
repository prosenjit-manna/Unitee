<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">

    <!-- INICIO CONTENIDO -->
    <div class="page-content">
        <!-- INICIO TITULO DE LA PAGINA -->
        <!--Inicio Alertas-->
        <!--Fin Alertas-->
        <h3 class="page-title">
            Unitee - Ver Notificaciones
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
                    <a href="#">Ver Notificaciones</a>
                </li>
            </ul>
            <div class="page-toolbar">

            </div>
        </div>
        <!-- FINAL BREADCUMBS -->

        <!-- INICIO DASHBOARD STATS -->
        <div class="page-content-wrapper">
            <div class="row scroller" style="height:385px" data-always-visible="1" data-rail-visible1="1">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-speech font-green-sharp"></i>
                            <span class="caption-subject bold uppercase"> Lista de Notificaciones</span>
                        </div>                       
                    </div>
                    <div class="portlet-body">
                        <div class="">
                            <table class="table table-striped table-hover table-bordered" id="notifications_table">
                                <thead>
                                    <tr>
                                        <th>

                                        </th>
                                        <th>
                                <p align="center">Descripción</p>
                                </th>
                                <th>
                                <p align="center">Fecha</p>
                                </th>
                                <th>
                                <p align="center">Leido</p>
                                </th>
                                <th>

                                </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notify as $n): ?>
                                        <tr id="notify_<?php echo $n->id; ?>">
                                            <td>
                                                <p align="center">
                                                    <i class="<?php echo $n->icon; ?>" style="font-size:18px; color:green;"></i> 
                                                </p>
                                            </td>
                                            <td >
                                                <p align="center" style="font-size:14px;"><?php echo $n->description; ?></p>
                                            </td>
                                            <td >
                                                <p align="center" style="font-size:14px;"><?php echo $n->date; ?></p>
                                            </td>
                                            <td >
                                                <p id="read_nofify_<?php echo $n->id; ?>" align="center">
                                                    <?php if ($n->read == 0): ?>
                                                        <a href="javascript:mark_read(<?php echo $n->id; ?> , 1);"><i class="icon-eye-close" style="font-size:20px; color:green;"></i> </a>  
                                                    <?php else: ?>
                                                        <a href="javascript:mark_read(<?php echo $n->id; ?> , 0);"><i class="icon-eye-open" style="font-size:20px; color:green;"></i> </a>  
                                                    <?php endif; ?>
                                                </p>
                                            </td>
                                            <td >
                                                <p align="center"><a href="<?php echo site_url("/notify?id=" . $n->id . "&redirect=" . $n->redirect); ?>" class="btn btn-success btn-sm input-circle">Ver</a></p>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
                <div>
                </div>  
            </div>
            <!-- FINAL ESTILOS DE LA BARRA -->

        </div>
    </div>
</div>
<script>
    var $id = null;

    var table_loader = function() {

        var table = $('#notifications_table');

        table.dataTable({
            "lengthMenu": [
                [5, 15, 30, -1],
                [5, 10, 30, "Todos"]
            ],
            "pageLength": 5,
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Mostrando _START_ a _END_ en total de _TOTAL_ notificaciones",
                "infoEmpty": "No se han encontrado notificaciones ...",
                "infoFiltered": "(filtered1 from _MAX_ total records)",
                "lengthMenu": "Mostar _MENU_ Notificaciones",
                "search": "Buscar:",
                "zeroRecords": "Ninguna notificacion encontrado ..."

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
    };

    var mark_read = function(id , state){
        var tasking = new jtask();
        tasking.url = "<?php echo site_url("/dashboard/read_notification"); ?>";
        tasking.data = {"id": id , "state": state};
        tasking.beforesend = true;
        tasking.config_before(function(){
            $("#read_nofify_" + id).html('<i class="icon-refresh" style="font-size:20px; color:green;"></i>');
        });
        tasking.success_callback(function(d) {
                  switch(state)
                  {
                      case 0:
                          $("#read_nofify_" + id).html('<a href="javascript:mark_read(' + id + ', 1);"><i class="icon-eye-close" style="font-size:20px; color:green;"></i> </a>  ');
                          break;
                      case 1:
                          $("#read_nofify_" + id).html('<a href="javascript:mark_read(' + id + ', 0);"><i class="icon-eye-open" style="font-size:20px; color:green;"></i> </a>  ');
                          break;
                  }
        });
        tasking.do_task();
    };
    
    
</script>
