<!-- INICIO CONTENIDO -->
<div class="page-content-wrapper">

    <!-- INICIO CONTENIDO -->
    <div class="page-content">

        <!-- INICIO TITULO DE LA PAGINA -->
        <h3 class="page-title">
            Unitee - Ver Proveedor
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
                    <a href="#">Ver Proveedor</a>
                </li>
            </ul>
            <div class="page-toolbar">  
            </div>
        </div>
        <!-- FINAL BREADCUMBS -->

        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption font-green-sharp">
                            <i class="icon-th-large font-green-sharp"></i>
                            <span class="caption-subject bold uppercase"> MODULOS</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group">
                                <a class="btn btn-circle btn-default btn-sm" href="javascript:;" data-toggle="dropdown">
                                    <i class="icon-upload-alt"></i><strong> X </strong> Actualizaciones Disponibles
                                </a>
                            </div>
                            <a href="javascript:;" class="btn btn-circle red-sunglo btn-sm">
                                <i class="icon-plus"></i> Add </a>                            
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-hover table-light gtreetable" id="gtreetable">
                            <thead>
                                <tr>
                                    <th>
                                        Nested Tree Table
                                    </th>
                           
                                </tr>
                            </thead>
                         
                        </table>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
        <!-- END PAGE CONTENT-->

    </div>
</div>
<script>
    
    
    var plugins_system = function() {

    var plugins = function() {

           jQuery('#gtreetable').gtreetable({
            'draggable': true,
            'source': function(id) {
                return {
                    type: 'POST',
                    url: '<?php echo site_url("/Dashboard/modulos/"); ?>',
                    data: {
                        'id': id
                    },
                    dataType: 'json',
                    error: function(XMLHttpRequest) {
                        alert(XMLHttpRequest.status + ': ' + XMLHttpRequest.responseText);
                    }
                }
            },
            'sort': function (a, b) {          
                var aName = a.name.toLowerCase();
                var bName = b.name.toLowerCase(); 
                return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));                            
            },
            'types': { default: 'glyphicon glyphicon-folder-open', folder: 'glyphicon glyphicon-folder-open'},
            'inputWidth': '255px'
        });
       
    }

    return {

        //main function to initiate the module
        init: function() {
            plugins();
        }

    };

}();
    

    
</script>
