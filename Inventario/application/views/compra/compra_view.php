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
                               
                                <div class="form-group dropdown col-md-12">
                                    <select id="find_option"  required="required" id="select" onchange=""  name="txt_pais" class="form-control">
                                        <option value="-1">Seleccionar opción</option>
                                        <option value="1">P.O.</option>
                                        <option value="2">Factura</option>
                                        <option value="3">Producto</option>                     
                                    </select>
                                </div><br><br>
                              
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input id="txt_find" type="text" class="form-control" placeholder="busca algo ">
                                        <span class="input-group-btn">
                                            <button title="dar click para realizar la busqueda" name="button_find" id="button_find" class="btn btn-info" type="button"><i class="icon-search"></i></button>
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
                            <div  class="portlet light bordered col-md-12">
                                <ul id="result_set" class="list-group  scroller" style="height:160px">
                                    
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
                                    <ul id="buy_invoice" class="list-group col-md-12">
                                         <!-- N° de compra , precio etc ... -->
                                         
                                    </ul>
                                    <div id="tab_responsive" class="portlet light bordered col-md-12">
                                           <!-- TABULACIONES DE ELEMENTOS ENCONTRADOS EN COMPRAS  -->
                                           <center><i class="icon-search" style="font-size:20px;"></i></center>
                                           <br>
                                           <center><p><b>Realiza una busqueda de tus compras ...</b></p></center>
                                    </div>
                                    <br>
                                    <ul id="buy_data" class="list-group col-md-12">
                                        <!-- compras emitidas por  -->
                                    </ul>
                                <a data-toggle="modal" href="#responsive_delete" class="btn btn-danger glyphicon glyphicon-remove-circle"> Eliminar</a>
                                </div>
                                <div class="portlet-body">
                                    <div id="buy_adj" class="panel-group accordion" id="accordion3">
                                        <!-- Adjuntos , eliminar etc.. -->
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
                                            <div class="scroller" style="height:30px" data-always-visible="1" data-rail-visible="1">
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
    var $id_                = null;
    
    var $result_            = null;
    
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
                
                find_(option_ , value , "button_find");
                
            });

    };
    
    
    var find_ = function(option , value ,  request)
    {
        
               var task     = new jtask();
               task.url = "<?php echo site_url("Buy/Data"); ?>";
               
               task.data =  {
                   "option": option,
                   "value" : value
               }; 
               
               task.beforesend = true;
               
               task.config_before(function(){
                      
                      $("#" + request).attr("disabled" , true);
                      $("#tab_responsive").html('<div class="portlet light bordered col-md-12"> <center><img src="<?php echo $route; ?>images/dashboard/loading.gif" align="center" width="100px" height="100px"/></center><center><p>Buscando compras..</p></center></div>');
               });
               task.success_callback(function(v){
                       $("#" + request ).attr("disabled" , false);
                       $result_ = JSON.parse(v);
                       if($result_.length == 0){
                           $("#tab_responsive").html('<center><i class="icon-search" style="font-size:20px;"></i></center><center><p><b>No se encontraron resultados</b></p></center>');
                       }else{
                           $("#tab_responsive").html("");
                           $("#result_set").html("");
                           $("#tab_responsive").append('<ul  class="list-group">');
                          // $("#result_set").append('<ul class="list-group  scroller" style="height:160px">');
                           $.map($result_ , function(data){
                                result_view("tab_responsive" , data , option, 1);
                                result_view("result_set" , data , option , 0);
                           });
                           $("#tab_responsive").append('</ul>');
                          // $("#result_set").append('</ul>');
                       }
                      
               });
               task.do_task();
    };
    
    
    var result_view = function(request , object , option , size)
    {
    
          var print_ = '<li class="list-group-item">';
          
          if(size == 1)
                print_ += '<a href="javascript:view_buy(' + object.id + ')" style="text-decoration:none; color:black;"><span class="badge  badge-warning"><b>Factura</b> :' +  object.factura + ' </span><span class="badge  badge-info"><b>PO :</b>' + object.po + '</span></a><span class="badge badge-margine">';
          else
          {
              if(parseInt(option) == 1)
                   print_ += '<a href="javascript:view_buy(' + object.id + ')" style="text-decoration:none; color:black;"><b>PO :</b>' + object.po + '</a><span class="badge badge-margine">';
              else 
                   print_ += '<a href="javascript:view_buy(' + object.id + ')" style="text-decoration:none; color:black;"><b>Factura</b> :' +  object.factura + '</a><span class="badge  badge-danger ">';
          }

          switch(parseInt(option))
          {
              case 3:
                  if(size == 1)
                        print_ +=  object.color + '</span><span class="badge ">' + object.fecha + '</span>';
                   else
                        print_ +=  object.color + '</span>';
                  break;
              default:
                  print_ += object.fecha + '</span>';
                  break;
          }
          
          print_ += ' </li>';
          
          $("#" +  request ).append(print_);
    };
    
    
    var view_buy = function(i)
    {
       
           var task     = new jtask();
           task.url = "<?php echo site_url("Buy/Product"); ?>";
           task.data =  {  "id": i }; 
           task.success_callback(function(r){
               
           });
           task.do_task();
           
           $.map($result_ , function(data){
                if(parseInt(data.id) === parseInt(i))
                {
                  
                   var d = '<li class="list-group-item">';
                       d+= '<p class="col-md-2"><b>Factura </b></p>';
                       d+= '<p class="col-md-3">' + data.factura + '</p>';
                       d+= '<p class="col-md-3"><b>Fecha compra</b></p>';
                       d+= '<p class="col-md-4">' + data.fecha + '</p><br>';
                       d+= '</li>';
                       
                   var p = '<li class="list-group-item">';
                       p += '<p class="col-md-5"><b>Precio total de la compra</b></p>';
                       p += '<p class="col-md-3">$' + data.total + '</p>';
                       p += '<p class="col-md-2"><b>P.O.</b></p>';
                       p += '<p class="col-md-2">' + data.po + '</p><br><br>'
                       p += '</li>';
                       p += '<li class="list-group-item">';
                       p += '<p class="col-md-4"><b>Emitida por : </b></p>'; 
                       p += '<p class="col-md-8">' + data.user + '</p><br>'
                       p += '</li>';
                       p += '<li class="list-group-item">';
                       p += '<p class="col-md-4"><b>Proveedor:</b> </p>';
                       p += '<p class="col-md-8">' + data.proveedor + '</p><br>';
                       p += '</li>';
                       
                   $("#buy_data").html(p);
                   $("#buy_invoice").html(d);
                     
                }
           });
               
    };


  
    
   

</script>
