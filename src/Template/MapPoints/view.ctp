<?php
    /* Para probar $mapPoints
    foreach ($mapPoints as $point) {
        echo 'latitud: '.$point ['latitude'].', longitud: '.$point ['longitude'].', nombre: '.$point ['name'].'<br />';
        foreach ($point ['images'] as $image) {
            echo implode ($image).'<br />';
        }
        foreach ($point ['videos'] as $video) {
            echo implode ($video).'<br />';
        }
        foreach ($point ['texts'] as $text) {
            echo implode ($text).'<br />';
        }
    } */
?>
<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->script('jquery.magnific-popup.js') ?> 
<?= $this->Html->css('magnific-popup.css') ?> 

<style type="text/css">

  #open-popup {
    padding:20px
  }
  
  .white-popup {
    position: relative;
    background: #FFF;
    padding: 40px;
    width: auto;
    max-width: 200px;
    margin: 20px auto;
    text-align: center;
  }

  .mfp-fade.mfp-bg {
    opacity: 0;
    -webkit-transition: all 0.15s ease-out; 
    -moz-transition: all 0.15s ease-out; 
    transition: all 0.15s ease-out;
  }
  .mfp-fade.mfp-bg.mfp-ready {
    opacity: 0.8;
  }
  .mfp-fade.mfp-bg.mfp-removing {
    opacity: 0;
  }

  .mfp-fade.mfp-wrap .mfp-content {
    opacity: 0;
    -webkit-transition: all 0.15s ease-out; 
    -moz-transition: all 0.15s ease-out; 
    transition: all 0.15s ease-out;
  }
  .mfp-fade.mfp-wrap.mfp-ready .mfp-content {
    opacity: 1;
  }
  .mfp-fade.mfp-wrap.mfp-removing .mfp-content {
    opacity: 0;
  }

</style>
    <style>
    #map-canvas {
        margin: 0;
        padding: 0;
        height: 550px;
        max-width: none;
        width: auto;
    }
    #map-canvas img {
        max-width: none !important;
    }
    .gm-style-iw {
        width: 350px !important;
        top: 0px !important;
        left: 0px !important;        
        background-color: #fff;
        border: 0px #fff;
        border-radius: 25px 0px 25px 25px;
    }


    #iw-container {
        margin-bottom: 10px;
    }
    /*Características del título*/
    #iw-container .iw-title {
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 22px;
        font-weight: 400;
        padding: 10px;
        background-color: #ffff99;
        color: black;
        margin: 0;
    }
    /*Características del contenido*/
    #iw-container .iw-content {
        font-size: 13px;
        line-height: 18px;
        font-weight: 400;
        padding: 15px 5px 20px 15px;
        max-height: 140px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    /*Imagenes*/
    .iw-content img {
        float: right;
        margin: 0 5px 5px 10px; 
    }
    .iw-subTitle {
        font-size: 16px;
        font-weight: 700;
        padding: 5px 0;
    }

    /*Botón de cerrar*/

    #iconoImagen {
        font-size: 15px;
        margin-right: 0px; 
        margin-top: 5px;
    }

    #iconoVideo {
        font-size: 20px;
        margin-right: 0px; 
    }


  .custom-iw .gm-style-iw {
      top:0px !important;

  }
  .custom-iw>div:first-child>div:nth-child(2) {
      display:none;
  }
  /** the shadow **/
  .custom-iw>div:first-child>div:last-child {
    display: none;
  }

  .custom-iw .gm-style-iw, 
  .custom-iw .gm-style-iw>div, 
  .custom-iw .gm-style-iw>div>div {
      width:100% !important;
      max-width:100% !important;
  }
  /** set here the width **/
  .custom-iw, 
  .custom-iw>div:first-child>div:last-child {
      width:350px !important;
  }


  /** close-button(note that there may be a scrollbar) **/
  .custom-iw>div:last-child {
      top:1px !important;
      right:0 !important;
  }



    </style>
        
        <h1><?php echo $title; ?></h1>
    <div id="map-canvas">
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfpStLLTf3UeMblxDulglE9fMhTy4peMA
&callback=initMap"></script>
    <script>
    /*
 * 5 ways to customize the Google Maps infowindow
 * 2015 - en.marnoto.com
 * http://en.marnoto.com/2014/09/5-formas-de-personalizar-infowindow.html
*/

// map center
<?php 
    echo "var center = new google.maps.LatLng($latLong);";
?>

function initialize() {
  var mapOptions = {
    center: center,
    zoom: 12,    
    mapTypeId: 'terrain'
  };

  var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

  
   // A new Info Window is created and set content
  var infowindow = new google.maps.InfoWindow();

  <?php foreach ($mapPoints as $point): ?>
  // InfoWindow content

  var $n = "<?= h($point ['page_id']); ?>";
  var $content = '<div id="iw-container">' +
                    '<div class="iw-title"><?= $point ['sequence_number']; ?>. Quaerat voluptatem</div>' +
                    '<div class="iw-content">' +
                      '<div class="iw-subTitle">History</div>' +
                      '<img src="http://maps.marnoto.com/en/5wayscustomizeinfowindow/images/vistalegre.jpg" alt="Porcelain Factory of Vista Alegre" height="115" width="83">' +
                      '<p>Founded in 1824, the Porcelain Factory of Vista Alegre was the first industrial unit dedicated to porcelain production in Portugal. For the foundation and success of this risky industrial development was crucial the spirit of persistence of its founder, José Ferreira Pinto Basto. Leading figure in Portuguese society of the nineteenth century farm owner, daring dealer, wisely incorporated the liberal ideas of the century, having become "the first example of free enterprise" in Portugal.</p>'
                        <?php
                            if (count ($point ['images']) > 0) {
                                echo '+ \'<button class = \\"btn btn-warning\\" id=\\"\'+$n+\'\\" onclick = \\"show_content_image(this.id);\\" style = \\"height: 45px;\\"><p class=\\"marker_options\\" ><i class=\\"glyphicon glyphicon-picture\\" id=\\"iconoImagen\\"></i> Ver imágenes</p></button>\'+\'&nbsp&nbsp&nbsp\'';
                            }
                            if (count ($point ['videos']) > 0) {
                                echo '+ \'<button class = \\"btn btn-primary\\" id=\\"\'+$n+\'\\" onclick = \\"show_content_video(this.id);\\" style = \\"height: 45px;\\"><p class =\\"marker_options\\" ><i class=\\"glyphicon glyphicon-film\\" id=\\"iconoImagen\\"></i> Ver videos</p></button>\'';
                            }
                        ?>
                    + '</div>' +
                    '<div class="iw-bottom-gradient"></div>' +
                  '</div>';


       var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
        new google.maps.Size(40, 37),
        new google.maps.Point(0, 0),
        new google.maps.Point(12, 35));

  //infowindow.setContent($content[0]);
  var factory = new google.maps.LatLng(<?= $point ['longitude']; ?>, <?= $point ['latitude']; ?>);   
  // marker options
  var marker = new google.maps.Marker({
    position: factory,
    map: map,
    optimized: false,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                shadow: pinShadow
  });


 google.maps.event.addListener(marker,'click', (function(marker,$content,infowindow){ 
    return function() {                
        infowindow.setContent($content);
        infowindow.open(map,marker);
    };
})(marker,$content,infowindow)); 

  // Event that closes the Info Window with a click on the map
  google.maps.event.addListener(map, 'click', function() {
      infowindow.close();
  });


  google.maps.event.addListener(infowindow,'domready',function(){ 
    var iwOuter = $('.gm-style-iw');

    iwOuter.parent().addClass('custom-iw');


});

    // *
  google.maps.event.addListener(infowindow, 'domready', function() {

    // Reference to the DIV that wraps the bottom of infowindow
    var iwOuter = $('.gm-style-iw');

    /* Since this div is in a position prior to .gm-div style-iw.
     * We use jQuery and create a iwBackground variable,
     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
    */
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

  <style>
  .mfp-bottom-bar {
      margin-top: 5px;
  }

  img.mfp-img {
      padding: 40px 0 0px;
  }
  </style>