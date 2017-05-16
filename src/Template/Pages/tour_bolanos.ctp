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

<?= $this->Html->css('information.css') ?> 

	<div class="help-tip">
		<p>En esta página usted encontrará información general acerca de la Isla Bolaños y alrededores.</p>
	</div>

	<div id="wrapper_pantalla">
		<div id="wrapper_introduccion">

			<!--Elemento lateral de navegacion-->
			<nav class="col-sm-3" id="scroll_item">
				<ul class="nav nav-pills nav-stacked">
					<li><a class="nav_item" href="#estilo1"></a></li>
					<li><a class="nav_item" href="#estilo2"></a></li>
				</ul>
			</nav>

		<div class="wrapper_introduccion_texto">

			<section class="wrapper" id="estilo1" style="background-image: url(<?=h($images[0]->link_path)?>);">
				<div class="container">
					<div class="row">
						<div class="col-md-4" id="titulo">
							<h3>
								Isla Bolaños y alrededores
							</h3>
						</div>
						<div class="col-md-4 pull-right">
							<p>
								<?php echo $text[0]->description; ?>
							</p>
						</div>
					</div>
				</div>
			</section>

			<!-- Pendiente de hablar
			<section class="wrapper" id="estilo2" style="background-image: url(<?=h($images[1]->link_path)?>);">
				<div class="container">
					<div class="row">
						<div class="col-md-4 pull-right">
							<p>
								<?php echo $text[1]->description; ?>
							</p>
						</div>
					</div>		
				</div>
			</section>-->

		</div>
		</div>
	</div>

	<script>
	$(document).ready(function(){
  		// Añadir scrollspy al <body>
  		$('body').scrollspy({target: "#scroll_item", offset: 200}); 

  		//smooth scrolling
		$("#scroll_item a").click(function() {

			var h = String(this.href).match(/#\w+\d/);
			var seccion = String(h);
			$('html,body').animate({
    		scrollTop: $(seccion).offset().top},
    		'slow');
		});
	});
	</script>