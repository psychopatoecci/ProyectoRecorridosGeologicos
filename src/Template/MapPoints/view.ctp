
<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('jquery.magnific-popup.js') ?> 
<?= $this->Html->css('magnific-popup.css') ?> 

<?= $this->Html->css('map.css') ?> 
  
<!-- Boton de ayuda para el usuario -->
<div class="title">
  <div class="help-tip">
    <p>Presione los marcadores del mapa para ver la informaci&oacute;n relativa a cada ubicaci&oacute;n.</p>
  </div>
  <!-- Titulo del recorrido -->
  <h1><?php echo $title; ?></h1>
</div>

<!-- Mapa del recorrido -->
<div id="map-canvas"> </div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfpStLLTf3UeMblxDulglE9fMhTy4peMA&callback=initMap&language=es"></script>


<!-- Logica del mapa del recorrido -->
<script>

//  Se asigna el punto de referencia central del mapa
<?php 
    echo "var center = new google.maps.LatLng($latLong);";
?>

// Función de inicialización del mapa
function initialize() {

    //  Calculo del zoom inicial del mapa tomando como referencia en ancho de la pantalla
   var width_user = window.innerWidth;
   
    <?php if ( $_SERVER['REQUEST_URI'] === '/pages/tour/2' ): ?>

       if(width_user > 795) {
          var mapOptions = {center: center,zoom: 12, mapTypeId: 'terrain'};
       }
       else if (width_user <= 795 && width_user > 410) {
          var mapOptions = {center: center,zoom: 11, mapTypeId: 'terrain'};
       }
       else if (  width_user <= 410 && width_user > 225) {
          var mapOptions = { center: center,zoom: 10, mapTypeId: 'terrain' };
       }
       else {
          var mapOptions = { center: center, zoom: 9, mapTypeId: 'terrain'};
       }

    <?php else: ?>
          var mapOptions = {center: center,zoom: 12, mapTypeId: 'terrain'};
    <?php endif; ?>

    //  Creación del objeto mapa
    var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

  
    // Se crea una ventana informativa
    var infowindow = new google.maps.InfoWindow();

    // Se asignan atributos al mapa cuando el tamaño de la pantalla cambia
    google.maps.event.addDomListener(window, "resize", function() {
     
      var center = map.getCenter();
      google.maps.event.trigger(map, "resize");
      map.setCenter(center);

      var width_user = window.innerWidth;
    
      <?php if ( $_SERVER['REQUEST_URI'] === '/pages/tour/2' ): ?>
          if(width_user > 795) {
              map.setZoom(12);
           }
          else if ( width_user <= 795 && width_user > 410){
            map.setZoom(11); 
          }
          else if ( width_user <= 410 && width_user > 225){
            map.setZoom(10); 
          }
          else{
            map.setZoom(9);  
          }
      <?php else: ?>
           map.setZoom(12); 
      <?php endif; ?>
    });

    <?php foreach ($mapPoints as $point): ?>
  
    // ----------------------- Contenido de la ventana informativa  ------------------------

    var $n = "<?= h($point ['page_id']); ?>";
    var $content = '<div id="iw-container">' +
        '<div class="iw-title"><?= $point ['name']; ?></div>' +
                      '<div class="iw-content">' +
                        //'<div class="iw-subTitle">History</div>' +
                        //'<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
    <?php
        echo "'<p>";
        if ( count ($point ['texts']) == 0 
            && count ($point ['videos']) == 0
            && count ($point ['images']) == 0 ) {
            echo 'Lo sentimos, en este momento no hay información disponible de este punto del recorrido.';
        }
        foreach ($point ['texts'] as $text) {
            echo $text ['description'];
        }
        echo "</p>'";
        if (count ($point ['images']) > 0) {
            echo '+ \'<button class = \\"btn btn-warning\\" id=\\"\'+$n+\'\\" onclick = \\"show_content_image(this.id);\\" style = \\"height: 45px;\\"><p class=\\"marker_options\\" ><i class=\\"glyphicon glyphicon-picture\\" id=\\"iconoImagen\\"></i> Imágenes</p></button>\'+\'&nbsp&nbsp&nbsp\'';
        }
        if (count ($point ['videos']) > 0) {
            echo '+ \'<button class = \\"btn btn-primary\\" id=\\"\'+$n+\'\\" onclick = \\"show_content_video(this.id);\\" style = \\"height: 45px;\\"><p class =\\"marker_options\\" ><i class=\\"glyphicon glyphicon-film\\" id=\\"iconoImagen\\"></i> Videos</p></button>\'';
        }
    ?>
    + '</div>' +
        '<div class="iw-bottom-gradient"></div>' +
    '</div>';

    // ----------------------- Icono de los puntos del mapa  ------------------------

    var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
    new google.maps.Size(40, 37),
    new google.maps.Point(0, 0),
    new google.maps.Point(12, 35));

    //infowindow.setContent($content[0]);
    var factory = new google.maps.LatLng(<?= $point ['latitude']; ?>, <?= $point ['longitude']; ?>);   
    // marker options
    var marker = new google.maps.Marker({
      position: factory,
      map: map,
      optimized: false, 
      icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png', 
      shadow: pinShadow
    });

    // ----------------------- Asignación de ventana informativa  ------------------------

    google.maps.event.addListener(marker,'click', (function(marker,$content,infowindow){ 
      return function() {                
        infowindow.setContent($content);
        infowindow.open(map,marker);
      };
    })(marker,$content,infowindow)); 

    // Evento para el cierre de la ventana
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
    });


    google.maps.event.addListener(infowindow,'domready',function(){ 
      var iwOuter = $('.gm-style-iw');
      iwOuter.parent().addClass('custom-iw');
    });

    google.maps.event.addListener(infowindow, 'domready', function() {

    var iwOuter = $('.gm-style-iw');

    var iwBackground = iwOuter.prev();

    iwOuter.parent().parent().css({center});
    // Reference to the div that groups the close button elements.
    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'center !important;'});

    // Moves the arrow 76px to the left margin 
    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'center !important;'});

    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6)'});

  });

  <?php endforeach; ?>

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<script type="text/javascript">

  // Método para mostrar de forma dinámica las imagen de un punto en especifico
  function show_content_image(id){

    var data_point = new Array();

    $.ajax({
      type:"POST",
      data: { 'point': id, },
      url:'/mapPoints/loadImage',
      success : function(data) {
        var array_parse = JSON.parse(data);
        for (var i in array_parse){
          for (var j in array_parse[i]){
            data_point.push({src:array_parse[i][j]}); 
          }
        }
      },
      async: false ,
      error : function() {
        alert("false");
      }
    });


    $.magnificPopup.open({
      items: data_point,
      gallery: {
        enabled: true
      },
      type: 'image' 
      });
    }

  // Método para mostrar de forma dinámica los videos de un punto en especifico
  function show_content_video(id){

        var data_point = new Array();

      $.ajax({
        type:"POST",
        data: {
            'point': id,
        },
        url:'/mapPoints/loadVideo',
        success : function(data) {
        var array_parse = JSON.parse(data);
        for (var i in array_parse){
          for (var j in array_parse[i]){
            data_point.push({src:array_parse[i][j],type:'iframe'}); 
            }
        }

        },
        async: false ,
        error : function() {
           alert("false");
        }
    });

    $.magnificPopup.open({
      items: data_point,
      gallery: {
        enabled: true
      },
      iframe: {
        markup:
          '<div class="mfp-iframe-scaler">'+
          '<div class="mfp-close"></div>'+
          '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
          '<div class="mfp-bottom-bar">'+
          '<div class="mfp-counter"></div>'+
          '</div>'+
          '</div>'
      },
      type: 'image' 
    });
  }
  </script>


