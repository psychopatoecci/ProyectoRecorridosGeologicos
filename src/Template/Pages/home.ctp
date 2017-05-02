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

<?= $this->Html->css('carrusel.css') ?>    

<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
  <!-- Indicators -->
<ol class="carousel-indicators">
  <?php for( $i=0; $i<$contentsLength; $i++ ): ?>
      <li data-target="#myCarousel" data-slide-to="<?= $i; ?>"></li>    
  <?php endfor; ?>
</ol>
  
<!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">  
<?php foreach ($contents as $content): ?>
  <?php if(!strcmp($content->content_type, 'image')): ?>
    <div class="item">    
      <img src="<?= h($content->link_path);?>" align="center">    
      <div class="carousel-caption">        
        <p><?= h($content->description);?>.</p>
      </div>
    </div>
  <?php endif; ?>
<?php endforeach; ?>
</div>
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div id="container_texto2">
	<p class="main-msg" >
		 <br>El litoral Pacífico Norte de Costa Rica ofrece sitios turísticos de importancia geológica,<br> como lo son la Isla Bolaños y la Península de Santa Elena, con diversos orígenes y lugares por conocer. </p>
</div>
<script>
//Pone la primera imagen de la ruta como activa
$(document).ready(function () {
  $('#myCarousel').find('.item').first().addClass('active');
});
</script>
