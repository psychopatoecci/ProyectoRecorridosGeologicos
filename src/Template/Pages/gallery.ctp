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

$cakeDescription = 'Galería';
?>

<?= $this->Html->script('galleria/galleria-1.5.7.js') ?> 
<?= $this->Html->css('gallery.css') ?> 
<?= $this->Html->css('\galleria\themes\fullscreen\galleria.fullscreen.min.css') ?>
<?= $this->Html->script('galleria/themes/classic/galleria.classic.min.js') ?> 



<div class="galleria">
<title> 
    <?php echo $title; ?>
</title>
    <?php foreach ($images as $image): ?>
        <img data-title="Titulo de la imagen si existe" data-description="en este campo van las descripciones de las imagenes correspondientes a la galleria"  src="<?php echo $image->link_path ;?>">
    <?php endforeach; ?>

</div>
   

<script>
( function(){ 
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

<style type="text/css">
    body, html {
    background: white;
	}

    .galleria-theme-classic .galleria-info-link {
	    background-position: -659px 4px !important;
	    filter: alpha(opacity=90) !important;
	    position: absolute !important;
	    width: 40px !important;
	    height: 40px !important;
	    cursor: pointer;
	    background-color: #0C6CAE !important;
	    border-radius: 20px !important;
	    zoom: 1.4 !important;
	    content: "Joe's Task:";
	}

	.galleria-theme-classic .galleria-info-text {
	    background-color: gray;
	    padding: 12px;
	    display: none;
	    zoom: 1.2;
	}

}
</style>