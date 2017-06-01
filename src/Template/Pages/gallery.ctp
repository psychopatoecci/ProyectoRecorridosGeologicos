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

<title> 
    <?php echo $title; ?>
</title>

<div class="galleria">
    <?php foreach ($images as $image): ?>
        <img src="<?php echo $image->link_path ;?>">
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