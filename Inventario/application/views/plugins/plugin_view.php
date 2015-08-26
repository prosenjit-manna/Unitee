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
                            <table class="table table-striped table-bordered table-hover" id="table_fixed">
                                <thead>
                                    <tr>
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
                                    <tr>
                                        <td>
                                            Editar Producto
                                        </td>
                                        <td>
                                            Productos
                                        </td>
                                        <td>
                                            Modulo para editar producto
                                        </td>
                                        <td style="text-align: center">
                                            <i class="icon-download-alt"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Nuevo Producto
                                        </td>
                                        <td>
                                            Productos
                                        </td>
                                        <td>
                                            Modulo para nuevo producto
                                        </td>
                                        <td>

                                        </td>
                                    </tr>                                        
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


    var plugins_system = function () {

        var plugins = function () {

            jQuery('#gtreetable').gtreetable({
                'draggable': true,
                'source': function (id) {
                    return {
                        type: 'POST',
                        url: '<?php echo site_url("/Dashboard/modulos/"); ?>',
                        data: {
                            'id': id
                        },
                        dataType: 'json',
                        error: function (XMLHttpRequest) {
                            alert(XMLHttpRequest.status + ': ' + XMLHttpRequest.responseText);
                        }
                    }
                },
                'sort': function (a, b) {
                    var aName = a.name.toLowerCase();
                    var bName = b.name.toLowerCase();
                    return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                },
                'types': {default: 'glyphicon glyphicon-folder-open', folder: 'glyphicon glyphicon-folder-open'},
                'inputWidth': '255px'
            });

        }

        return {
            //main function to initiate the module
            init: function () {
                plugins();
            }

        };

    }();



</script>
