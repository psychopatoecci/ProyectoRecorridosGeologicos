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
		<p>En esta página usted encontrará información general acerca de los Recorridos en el litoral de la costa noroeste de Costa Rica.</p>
	</div>

	<div id="wrapper_pantalla">
		<div id="wrapper_introduccion">

			<nav class="col-sm-3" id="scroll_item">
				<ul class="nav nav-pills nav-stacked">
					<li><a class="nav_item" href="#estilo1"></a></li>
					<li><a class="nav_item" href="#estilo2"></a></li>
					<li><a class="nav_item" href="#estilo3"></a></li>
					<li><a class="nav_item" href="#estilo4"></a></li>
				</ul>
			</nav>

		<div class="wrapper_introduccion_texto">

			<section class="wrapper" id="estilo1" style="background-image: url(<?=h($images[0]->link_path)?>)">
				<div class="container-fluid container_titulo">
					<div class="row">
						<div class="col-md-8" id="col_titulo">
							<p id="titulo">
								Recorridos a través de la historia geológica del noroeste de Costa Rica
							</p>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4" id="estilo1_row2">
							<p>
								<?php echo $text[0]->description; ?>
							</p>
						</div>
					</div>
				</div>
			</section>

			<section class="wrapper" id="estilo2" style="background-image: url(<?=h($images[1]->link_path)?>);">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4 pull-left">
							<p>
								<?php echo $text[1]->description; ?>
							</p>
						</div>
					</div>		
				</div>
			</section>

			<section class="wrapper" id="estilo3" style="background-image: url(<?=h($images[2]->link_path)?>);">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-6">
							<p> 
								<?php echo $text[2]->description; ?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 pull-right">
							<p>
								<?php echo $text[3]->description; ?>
							</p>
						</div>	
					</div>
				</div>
			</section>

			<section class="wrapper" id="estilo4" style="background-image: url(<?=h($images[3]->link_path)?>);">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">
							<p>
								<?php echo $text[4]->description; ?>
							</p>
						</div>
					</div>		
				</div>
			</section>
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