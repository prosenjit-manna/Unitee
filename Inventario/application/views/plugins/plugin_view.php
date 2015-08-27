<style>
    .class_tr {
        width: 100%;
        display: inline-table;
    }
    .class_tbody
    {
        overflow-y: scroll;
        overflow-wrap: scroll;
        height: 380px;
        width: 100%;
        position: relative;
    }


</style>
<!-- INICIO DE LA PAGINA -->
<div class="page-content-wrapper">

    <!-- INICIO CONTENIDO -->
    <div class="page-content">

        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Modulos
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
                    <a href="#">Modulos</a>
                </li>
            </ul>
            <div class="page-toolbar">  
            </div>
        </div>
        <!-- FINAL BREADCUMBS -->

        <!-- INICIA -->
        <div class="row">
            <div class="col-md-12">

                <!-- BEGIN PAGE CONTENT-->
                <div class="row scroller" style="height:450px" data-rail-visible="1">

                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption uppercase">
                                <i class="icon-globe"></i>Modulos Instalados
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <strong>X</strong> Instalaciones disponibles
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="table_plugin">
                                <thead
                                   
                                    <tr>
                                        <th></th>
                                        <th>
                                            Nombre del Modulo
                                        </th>
                                        <th>
                                            Seccion
                                        </th>
                                        <th>
                                            Descripcion
                                        </th>
                                        <th style="text-align: center">
                                            <i class="icon-download-alt"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                       
                                       $data_id = array();
                                       
                                       foreach ($data as $k=>$p){
                                                $section = $p['section'];
                                                for($i = 0 ; $i < count($p) - 1 ; $i++){
                                                  $data_id[$k.$i][] = $p[$i];
                                                  echo "<tr>",
                                                    "<td><span title='". $k . "" . $i ."' class='row-details row-details-close'></span></td>",
                                                    "<td>" .$p[$i]['config']['name'] . "</td>",
                                                    "<td>" . $section   . "</td>",
                                                    "<td>" .$p[$i]['config']['description'] . "</td>",
                                                    "<td  style='text-align: center'>" . "<button class='btn' onclick='alert();'><i class='icon-download-alt'></i></button>" . "</td>",
                                                    "</tr>";
                                                }
                                       }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->

                </div>            
            </div>
        </div>
        <!-- FINAL -->

    </div>
    <!-- FINAL CONTENIDO -->
    
</div>
<!-- FINAL DE LA PAGINA -->
<script>

 var $plugin_data = '<?php echo json_encode($data_id); ?>';

 var InitPlugin= function () {
        var table = $('#table_plugin');
        
        /* Formatting function for row expanded details */
        function fnFormatDetails(oTable, nTr  , id) {
            var object = JSON.parse($plugin_data);
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table>';
            $.each(object , function(k , d){
                var config      = d[0].config;
                var model       =d[0].model;
                var path        = d[0].path;
                if(k == id){
                    sOut += '<tr><td>Version:</td><td>' + config.version + '</td></tr>';
                    sOut += '<tr><td>Tipo:</td><td>' + config.type + '</td></tr>';
                    sOut += '<tr><td>Autor:</td><td>' + config.author + '</td></tr>';
                    sOut += '<tr><td>Actualizacion:</td><td><i class="icon-cloud-download"></i> <a href="#">Descargar 1.2</a></td></tr>';
                    sOut += '<tr><td>Detalles:</td><td><i class="icon-external-link"></i> <a href="#">Mayor Informacion</a></td></tr>';
                }
                
            });
  
            sOut += '</table>';
            return sOut;
        }

        var oTable = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "Show _MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
            "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }],
            "order": [
                [1, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5
        });

        var tableWrapper = $('#table_plugin_wrapper'); 
        var tableColumnToggler = $('#table_plugin_column_toggler');

       
        tableWrapper.find('.dataTables_length select').select2(); 

        
        table.on('click', ' tbody td .row-details', function () {
           var nTr = $(this).parents('tr')[0];
           var id = $(this).attr("title");
           if (oTable.fnIsOpen(nTr)) {
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            } else {
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr , id), 'details' );
            }
        });

        $('input[type="checkbox"]', tableColumnToggler).change(function () {
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
    };



</script>
