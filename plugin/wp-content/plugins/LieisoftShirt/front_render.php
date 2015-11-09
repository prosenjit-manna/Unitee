<?php
global $current_user;

if ($width == NULL) {
    $width = 1024;
}
if ($height == NULL) {
    $height = 600;
}

$webservices = get_option("color_web_services");
$article_ws = get_option("style_web_services");
$app_key = get_option("key_web_services");
$activate = TRUE;

if (empty($webservices) || $webservices == "http://") {
    $activate = FALSE;
}

$modes = array();
switch ($type) {
    case LS_CREATE:
        $modes = array(
            "section1" => "Diseña",
            "section2" => "Crea Tu campaña",
            "section3" => "Inicia Sesion"
        );
        break;
    case LS_UPDATE:
        $modes = array(
            "section1" => "Actualiza tu diseño",
            "section2" => "Mejora tu campaña",
            "section3" => "Guarda tus cambios"
        );
        break;
    default:
        $modes = array(
            "section1" => "Diseña",
            "section2" => "Crea Tu campaña",
            "section3" => "Inicia Sesion"
        );
        break;
}


$labels_color = "darkblue";
?>


<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>


<input type="hidden" id="global_price" value="" />
<input type="hidden" id="wp_path" value="<?php echo ABSPATH; ?>" />
<div id="pasos">
    <h3><?php echo $modes['section1']; ?></h3>
    <section align="center">
        <div  class="row">
            <div class="col-md-12">
                <div id="fpd">
                    <div class="fpd-category" title="main_category">
                        <div class="fpd-product" title="front" data-thumbnail="Estilo de ejemplo">
                            <img scale="10"  src="<?php echo plugins_url('/img/', __FILE__); ?>init.png" title=" Camisa de Ejemplo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h3><?php echo $modes['section2']; ?></h3>
    <section>
        <div class="row">
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div style="visibility:hidden;" id="label_alert" class="alert alert-danger" role="alert"></div>    
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">* Titulo</label>
                                <div  class="col-sm-6">
                                    <input type='text' id='txt_titulo' class="form-control" />
                                    <p></p>
                                    <span style="background-color:<?php echo $labels_color; ?>;" class="label ">Agrega un titulo <b>Genial</b> a tu camisa </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">* # Camisas Objetivo</label>
                                <div  class="col-sm-6">
                                    <input id="txt_camisas" data-slider-id='ex1Slider' type="text" data-slider-min="1" data-slider-max="400" data-slider-step="1" data-slider-value="1"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4  control-label">* Precio $</label>
                                <div class="col-sm-4">
                                    <input  type="number" class="form-control" id="txt_precio" placeholder="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">* Duración </label>
                                <div class="col-sm-6">
                                    <input type='text' id='txt_duracion' class="form-control" />
                                    <p></p>
                                    <span style="background-color:<?php echo $labels_color; ?>;" class="label ">El tiempo que durara tu campaña </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label"> Descripción </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="txt_descripcion" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">* Tags </label>
                                <div class="col-sm-6">
                                    <input  data-role="tagsinput" id="txt_tags" class="form-control" type="text" placeholder="" size="4" style="width: 15em !important;">
                                    <p></p>
                                    <span style="background-color:<?php echo $labels_color; ?>;" class="label ">Agrega un tag , luego presiona enter </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <a href="#" id="img_front"  class="thumbnail"></a>
                        <a href="#"  id="img_back" class="thumbnail"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php if ($current_user->ID == NULL || empty($current_user->ID)): ?>
        <h3><?php echo $modes['section3']; ?></h3>
        <section id="login_from">
        <?php echo do_shortcode('[woocommerce_my_account]'); ?>
        </section>
        <?php endif; ?>  
</div>




<script type="text/javascript">

    var fancy,
            $data_store,
            select_variacion,
            count_camisas,
            camisas_tipos,
            camisas_categoria,
            coordFront,
            id_style,
            coordBack;

    var img_url = "<?php echo $webservices; ?>images/articulos/";


    jQuery(document).ready(function ($) {

        var _labelErr = function (state, msj) {
            var label = $("#label_alert");
            switch (state) {
                case 0:
                    label.css("visibility", "hidden");
                    break;
                case 1:
                    label.css("visibility", "visible");
                    $("a[href='#finish']")
                            .attr("data-toggle", "popover")
                            .attr("data-placement", "top")
                            .attr("title", "Faltan campos.")
                            .attr("data-content", "(*) Campos Obligatorios ...")
                            .popover('show');
                    break;
            }
            label.html(msj);
        };

        var _finish = function () {


            var $price = $("#txt_precio").val();
            var _task = new jtask();
            _task.beforesend = true;
            _task.config_before(function(){
                  $("a[href='#finish']").attr("disabled", "disabled");
            });
            _task.cache = true;
            _task.url = "<?php echo $webservices . "NockupShop/GetSizes/" . $app_key . "/" ?>" + id_style + "/" + select_variacion + "/" + $price;
            _task.success_callback(function (s) {



                var ftask = new jtask();

                ftask.url = "<?php echo plugins_url('/', __FILE__); ?>wc_response.php";


                if ($("#txt_duracion").val() === "undefined"
                        || $("#txt_duracion").val() === "") {
                    _labelErr(1, "Se necesita la fecha cuando terminara la campaña.");
                    return;
                }
                else
                {

                    var duracion = new Date($("#txt_duracion").val());
                    var current = new Date();
                    var min = (1000 * 60);
                    var hour = min * 60;
                    var day = hour * 24;
                    var week = day * 7;
                    var the_week = current.getTime() + week;
                    var the_month = current.getTime() + (week * 4);

                    if (duracion.getTime() < the_week) {
                        console.log("La campaña debe de durar minimo una semana ");
                        _labelErr(1, "La campaña debe ser minimo una semana.");
                        return;
                    }
                    else if (duracion.getTime() > the_month) {
                        _labelErr(1, "La campaña debe ser maximo 4 semanas");
                        return;
                    }
                }


                if ($("#txt_precio").val() === $("#global_price").val())
                {
                    _labelErr(1, "El precio de tu camisa no debe ser igual al costo.");
                    return;
                }

                if (typeof camisas_categoria === "undefined") {
                    _labelErr(1, "No ha seleccionado un diseño. ");
                    return;
                }

                if ($("#txt_camisas").val() <= 1) {
                    _labelErr(1, "Favor crear la campaña de camisas.");
                    return;
                }

                if ($("#txt_duracion").val() === "undefined"
                        || $("#txt_duracion").val() === "") {
                    _labelErr(1, "La campaña debe tener una fecha limite para continuar.");
                    return;
                }

                if ($("#txt_tags").val() === "undefined"
                        || $("#txt_tags").val() === "") {
                    _labelErr(1, "Agrega agunos tags separados por comas ej: camisas , color negro , ...");
                    return;
                }



                //var d = JSON.stringify(fancy.getViewsDataURL("png"));

                var d = [
                    $("#d1").attr("src"),
                    $("#d2").attr("src")
                ];



                var data = {
                    "txt_camisas": $("#txt_camisas").val(),
                    "txt_precio": $("#txt_precio").val(),
                    "txt_duracion": $("#txt_duracion").val(),
                    "txt_descripcion": $("#txt_descripcion").val(),
                    "txt_tags": $("#txt_tags").val(),
                    "images": JSON.stringify(d),
                    "path": $("#wp_path").val(),
                    "titulo": $("#txt_titulo").val(),
                    "camisas_cat": camisas_categoria,
                    "coordf": JSON.stringify(coordFront),
                    "coordb": JSON.stringify(coordBack),
                    "id": id_style,
                    "attr" : s
                };
                

                ftask.beforesend = true;
                ftask.data = data;
                ftask.config_before(function () {
                    $("a[href='#finish']")
                            .html("<img  src='<?php echo plugins_url('/img/', __FILE__); ?>8.gif' />&nbsp; Guardando ...")
                            .attr("disabled", "disabled");
                });

                ftask.success_callback(function (call) {
                    
                    //alert(call);
                    var s = JSON.parse(call);
                    alert(s.message);
                    window.location.href = s.url;
                    //console.log(call);
                    
                    //var w = $.trim(call);
                   /* $("a[href='#finish']")
                            .html("Redireccionando")
                            .attr("disabled", "disabled");
                    window.location.href = w;*/
        
                    

                });

                ftask.do_task();



            });


            _task.do_task();
        };

        var _changed = function (event, currentIndex, priorIndex) {
            if (currentIndex === 1) {
                var ii = 0;
                var preview_ = fancy.getViewsDataURL("png");
                $.map(preview_, function (s) {
                    switch (ii) {
                        case 0:
                            $("#img_front").html('<img  id="d1"  src="' + s + '" alt="Frente ">');
                            break;
                        case 1:
                            $("#img_back").html('<img id="d2"  src="' + s + '" alt="Atras">');
                            break;
                    }
                    ii++;
                });

                var cc = {
                    "x": 115,
                    "y": 27,
                    "x2": 336,
                    "y2": 245,
                    "w": 221,
                    "h": 198
                };

                coordFront = cc;
                coordBack = cc;

                /***
                 * FUNCIONES Y VARIABLES DE PRUEBAS , 
                 * DEPRECADOS EN LA VERSION 1.5
                 * ***/

                /*    var c = {
                 "x":64,
                 "y":17,
                 "x2":231,
                 "y2":156,
                 "w":221,
                 "h":198
                 };
                 */


                /*   $('#d1').Jcrop({
                 bgFade: false,
                 setSelect: [c.x,c.y,c.x2,c.y2],
                 bgColor:     'transparent',
                 bgOpacity:   .4,
                 onSelect : function(cf){
                 coordFront = cf;
                 console.log(cf);
                 }
                 });*/


                /*    $('#d2').Jcrop({
                 bgFade: false,
                 setSelect: [c.x,c.y,c.x2,c.y2],
                 bgColor:     'transparent',
                 bgOpacity:   .4,
                 onSelect : function(cb){
                 coordBack = cc;
                 }
                 });*/


            }

        };


        //configuracion sistema steps
        $("#pasos").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            onFinished: _finish,
            onStepChanged: _changed

        });


        $('#txt_duracion').datetimepicker({
            sideBySide: true,
            enabledHours: [23]
        });


        count_camisas = $("#txt_camisas").bootstrapSlider({
            tooltip: 'always'
        });

        //obtenemos el valor del div fpd
        var $fancy = $('#fpd');

        //configuramos los parametros de la imagen
        var customImagesParams = jQuery.extend({
            "x": 0,
            "y": 0,
            "z": -1,
            "price": 0,
            "autoCenter": 1,
            "draggable": 1,
            "rotatable": 1,
            "resizable": 1,
            "zChangeable": 1,
            "autoSelect": 0,
            "topped": 0,
            "boundingBoxClipping": 1,
            "filter": true,
            "filters": ["grayscale", "sepia", "sepia2"],
            "removable": 1
        },
        {
            "minW": 100,
            "minH": 100,
            "maxW": 10000,
            "maxH": 10000,
            "resizeToW": 300,
            "resizeToH": 300
        }
        );

        //parametros iniciales para la caja de texto
        var customTextParams = {
            "x": 0,
            "y": 0,
            "z": -1,
            "colors": "#000",
            "price": 0,
            "autoCenter": 1,
            "draggable": 1,
            "rotatable": 1,
            "resizable": 1,
            "zChangeable": 1,
            "autoSelect": 1,
            "topped": 0,
            "patternable": 1,
            "curvable": 1,
            "curveSpacing": 10,
            "curveRadius": 80,
            "curveReverse": 0,
            "boundingBoxClipping": 0,
            "textSize": 30,
            "maxLength": 0,
            "textAlign": "left",
            "removable": 1
        };

        //configuramos la api de diseño 
        fancy = $fancy.fancyProductDesigner({
            width: <?php echo $width; ?>,
            stageHeight: <?php echo $height; ?>,
            elementParameters: {
                draggable: true,
                resizable: true,
                zChangeable: true,
                autoCenter: true,
                scale: 1.5
            },
            textParameters: {
                textSize: 16
            },
            imageParameters: {
                colorPrices: {},
                filter: true,
                filters: ['grayscale', 'sepia', 'sepia2']
            },
            templatesDirectory: "<?php echo plugins_url('/templates/', __FILE__); ?>",
            facebookAppId: "senecesitaunid_facebook",
            instagramClientId: "senecesita",
            instagramRedirectUri: "https://localhost",
            allowProductSaving: false,
            editorMode: true,
            phpDirectory: "<?php echo plugins_url('/img/', __FILE__); ?>",
            tooltips: true,
            fonts: [
                "Arial",
                "Helvetica",
                "Times New Roman",
                "Verdana",
                "Geneva"
            ],
            customImagesParameters: customImagesParams || {},
            customTextParameters: customTextParams || {},
            labels: {
                layersButton: "Manejar capas",
                addsButton: "Diseña tu camisa",
                productsButton: "Agrega un estilo",
                moreButton: "Acciones",
                downLoadPDF: "Descargar PDF",
                downloadImage: "Descargar Imagen",
                print: "Imprimir",
                saveProduct: "Guardar",
                loadProduct: "Cargar",
                undoButton: "Retroceder",
                redoButton: "Redo",
                resetProductButton: "Restablecer Estilo",
                zoomButton: "Zoom",
                panButton: "Pan",
                addImageButton: "Agrega tu imagen",
                addTextButton: "Agrega tu texto",
                enterText: "Entrar texto",
                addFBButton: "Agregar imagen desde facebook",
                addInstaButton: "Agregar imagen desde instagram",
                addDesignButton: "Seleccionar un diseño",
                editElement: "Editar elemento",
                fillOptions: "Filtrar opciones",
                color: "Color",
                patterns: "Patrones",
                opacity: "Opacidad",
                filter: "Filtrar",
                textOptions: "Opciones de texto",
                changeText: "Cambiar texto",
                typeface: "Typeface",
                lineHeight: "Line Height",
                textAlign: "Alineacion",
                textAlignLeft: "Alinear Izquierda",
                textAlignCenter: "Alinear Derecha",
                textAlignRight: "Alinear Central",
                textStyling: "Estilos",
                bold: "Bold",
                italic: "Italic",
                underline: "Underline",
                curvedText: "Curvar Texto",
                curvedTextSpacing: "Spaciado",
                curvedTextRadius: "Radio",
                curvedTextReverse: "Reversa",
                transform: "Transformar",
                angle: "Angulo",
                scale: "Scala",
                moveUp: "Move Arriba",
                moveDown: "Move Abajo",
                centerH: "Centrar Horizontal",
                centerV: "Centrar Vertical",
                flipHorizontal: "Voltear Horizontal",
                flipVertical: "Voltear Vertical",
                resetElement: "Restablecer Elemento",
                fbSelectAlbum: "Seleccionar un album",
                instaFeedButton: "My Feed",
                instaRecentImagesButton: "Mis imagenes recientes",
                productSaved: "Diseño guardado!",
                lock: "Bloquear",
                unlock: "Desbloquear",
                remove: "Remover",
                outOfContainmentAlert: "Mover en este contenedor",
                initText: "Unitee Design",
                myUploadedImgCat: "Tus fotos subidas",
                uploadedDesignSizeAlert: "Sorry! The image you have uploaded does not meet the size requirements.\nMinimum Width: 100 pixels\nMinimum Height: 100 pixels\nMaximum Width: 10000 pixels\nMaximum Height: 10000 pixels"
            },
            customAdds: {
                facebook: true,
                uploads: true,
                instagram: true,
                texts: true
            }

        }).data('fancy-product-designer');


        $fancy.on("ready", function () {
            /*
             * Si carga correctamente cargamos los articulos
             * los articulos se cargaran en el ws del sistema 
             * */

            load_articulos();
        });


    });


    function create_view() {

        var data = JSON.parse($data_store);
        var $v = new Array();

        $.map(data, function (m) {
            if (select_variacion == m.id_var)
            {
                id_variacion = m.id_var;
                var adj = JSON.parse(m.adjunto_data);
                $.map(adj, function (n) {
                    var view = {
                        title: n.type,
                        thumbnail: img_url + n.value,
                        elements: [{
                                "source": img_url + n.value,
                                "title": m.nombre + " [" + m.descripcion + "]",
                                "type": "image"
                            }]
                    };

                    $v.push(view);
                });
            }
        });

        fancy.addProduct($v);
        fancy.loadProduct($v);
        fancy.callDialogContent("adds", "Diseña tu camisa");

    }


    function change_color(variacion) {
        select_variacion = variacion;
        var store = JSON.parse($data_store);
        $.map(store, function (d) {

            if (d.id_var == variacion) {

                var adjunto_ = JSON.parse(d.adjunto_data);
                $.map(adjunto_, function (p) {

                    if (p.type === "front") {
                        var j = ('<img class="media-object img-circle" width="100" height="100" src="'
                                + img_url + p.value + '" alt="">');
                        $("#media_image").html(j);
                        return;
                    }
                });
            }
        });
    }


    function load_articulos() {

        $("#cmd_articulos").html("<option>Cargando ...</option>");
        var task = new jtask();
        task.url = "<?php echo $webservices . "index.php?/NockupShop/NonArticulos/" . $app_key . "/" ?>";
        task.method = "GET";
        task.conf_before = true;
        task.config_before(function () {
            $("#cmd_articulos").html("<option>Cargando ...</option>");
        });
        task.success_callback(function (call) {

            var json_art = JSON.parse(call);
            jQuery("#cmd_articulos").html("<option value='-1'>Seleccione un estilo</option>");

            camisas_tipos = [];

            jQuery.each(json_art, function (k, v) {
                jQuery("#cmd_articulos").append("<option value='" + v.id + "'>"
                        + v.nombre + " (" + v.descripcion + ")" + "</option>");

                camisas_tipos.push({"id": v.id, "name": v.nombre});
            });

            fancy.callDialogContent("products", "Seleccione un estilo");

        });
        task.do_task();

    }
    ;


    function style_select() {


        var id_art = $("#cmd_articulos").val();
        id_style = id_art;


        $.map(camisas_tipos, function (m) {
            if (m.id === id_art) {
                camisas_categoria = m.name;
            }
        });

        var html_data = '<div style="color:blueviolet;" class="panel panel-default">'
                + '<div class="media center ">'
                + '<img class="media-object img-circle" width="100" height="100" src="<?php echo plugins_url('/img/', __FILE__); ?>loading.gif" alt="">'
                + '</div></div>';

        $("#cmd_seccion_articulos").html(html_data);


        var task_ = new jtask();
        task_.url = "<?php echo $article_ws . "" . $app_key . "/" ?>" + id_art + "/";
        task_.method = "POST";
        task_.conf_before = true;
        task_.config_before(function () {
            $("#cmd_seccion_articulos").html(html_data);
        });
        task_.success_callback(function (call) {

            $data_store = call;

            var bg_color = 'blueviolet';

            var container = $("#cmd_seccion_articulos");

            container.html("");

            var data = "";
            data = ('<div style="color:' + bg_color + ';" class="panel panel-default">');

            var json_art = JSON.parse($data_store);


            data += ('<div align="center" class="media">');
            data += ('<div class="media-body">');

            var first_art = "";
            var price = "";

            jQuery.each(json_art, function (k, v) {

                data += ('<button  data-toggle="tooltip" data-placement="left" title="'
                        + v.color + '" onclick="" onmouseover="change_color(' + v.id_var + ');" type="button" style="background-color:'
                        + v.color_ref + ';" class="btn ">'
                        + "" + '</button>&nbsp;');

                if (first_art === "")
                {
                    select_variacion = v.id_var;  //optenemos el id del primer articulo

                    first_art = '';
                    first_art += ('<div align="center" id="change_art_media" class="media">');
                    first_art += ('<div  id="media_image" class="media-right">');

                    var image_front = JSON.parse(v.adjunto_data);
                    var img = null;
                    $.each(image_front, function (n, m) {
                        if (m.type === "front") {
                            img = m.value;
                        }
                    });

                    first_art += ('<img class="media-object img-circle" width="100" height="100" src="'
                            + img_url + img + '" alt="">');
                    first_art += ('</div>');
                    first_art += ('<div style="width:160px;"  class="media-body">');
                    first_art += ('<p></p>');
                    first_art += ('<h4 style="color:blueviolet;text-decoration-style:double;text-transform:uppercase;text-shadow:calc;" class="media-heading">'
                            + ("<span class='text-success' >" + v.nombre + "</span>")
                            + ('<br><span class="text-success small">&nbsp;' + v.descripcion + '</span>')
                            + ('<span  class="alignright">')
                            + '</h4>');
                    first_art += ('<p class="small-text"> ');
                    first_art += ('&nbsp;<span style="text-transform:uppercase;"  class="label label-primary">');
                    first_art += (v.tallas);
                    first_art += ('</span>');
                    first_art += ('&nbsp;<span style="text-transform:uppercase;"  class="label label-success">');
                    first_art += ("$" + v.precio);
                    first_art += ('</span>');
                    first_art += ('</p>');
                    first_art += ('</div>');
                    first_art += ('</div>');
                    price = v.precio;
                    $("#global_price").val(price);
                    $("#txt_precio").val(price);
                }

            });

            data += ('</div>');
            //  data +=('</div>');

            //  data +=('</div>');

            //  data += ('<div style="color:' + bg_color + ';" class="panel panel-default">');
            data += first_art;


            //  data +=('<div align="center" class="media">');
            data += ('<div id="art_price" class="media-body">');
            data += ('<span style="font-family:Helvetica;font-weight:bold;font-size:2.3rem;color:black;">Precio: </span>');
            data += ('<span style="font-family:Helvetica;font-weight:bold;font-size:2.3rem;color:blue;">$' + price + '</span>');
            data += '<br>&nbsp;&nbsp;<span><button onclick="create_view();" id="load_articulo_canvas" name="load_articulo_canvas" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Utilizar</button></span>'
            data += '</div></div>';
            data += '</div>';
            data += ('</div>');

            container.html(data);

        });
        task_.do_task();
    }
    ;




</script>

