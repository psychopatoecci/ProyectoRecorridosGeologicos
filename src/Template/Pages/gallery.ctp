<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<?= $this->Html->script('galleria/galleria-1.5.7.js') ?> 
<?= $this->Html->css('\galleria\themes\fullscreen\galleria.fullscreen.min.css') ?> 
<?= $this->Html->css('gallery.css') ?> 

<div class="galleria">
    <img src="/resources/gallery/Punto1-1. Estratos Rocosos.jpg">
    <img src="/resources/gallery/Punto2-1. Bajo Rojo.jpg">
    <img src="/resources/gallery/Punto4-1. Calizas.jpg">
    <img src="/resources/gallery/Punto5-1.jpg">
    <img src="/resources/gallery/Punto5-2.jpg">
    <img src="/resources/gallery/Punto6-1.jpg">
    <img src="/resources/gallery/Punto8-1. Estratificacion.jpg">
    <img src="/resources/gallery/Punto7-1. Estratos Volcados.jpg">
    <img src="/resources/gallery/Punto9-1. Vista Orosi-Cacao.jpg">
    <img src="/resources/gallery/Punto10-1. El Dragon de Roca.jpg">            
    <img src="/resources/gallery/Punto10-2.jpg">
	<img src="/resources/gallery/Punto11-1. Estratos Rocosos.jpg">
	<img src="/resources/gallery/Punto11-2.jpg">
	<img src="/resources/gallery/Punto12-1. Duna Costera.jpg">
	<img src="/resources/gallery/Punto13-1. Conglomerado.jpg">
	<img src="/resources/gallery/Punto14-1. Duna Costera.jpg">
	<img src="/resources/gallery/Punto15-1. Conglomerado.jpg">
	<img src="/resources/gallery/Punto15-3. Estratos Rocosos.jpg">
	<img src="/resources/gallery/Punto15-4. Pares Conjugados.jpg">
	<img src="/resources/gallery/Punto19-1. Estratificacion Cruzada.jpg">
	<img src="/resources/gallery/Punto19-2.jpg">
	<img src="/resources/gallery/Punto19-3.jpg">
	<img src="/resources/gallery/Punto19-4.jpg">
	<img src="/resources/gallery/Punto19-5.jpg">
	<img src="/resources/gallery/Punto19-6.jpg">
	<img src="/resources/gallery/Punto19-7.jpg">
	<img src="/resources/gallery/Punto19-8.jpg">
</div>
        
<script>
( function(){ 
    Galleria.loadTheme('../js/galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('.galleria', {
        extend: function(options) {
        Galleria.log(this) // the gallery instance
        Galleria.log(options) // the gallery options
        // listen to when an image is shown
        this.bind('image', function(e) {
            Galleria.log(e) // the event object may contain custom objects, in this case the main image
            Galleria.log(e.imageTarget) // the current image

            // lets make galleria open a lightbox when clicking the main image:
            $(e.imageTarget).click(this.proxy(function() {
                this.openLightbox();
            }));
        });
     }   
  });
}());

</script>

