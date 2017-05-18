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

$cakeDescription = 'Descripción de los Recorridos';
?>

<title>
    <?php echo $title; ?>
</title>

<?= $this->Html->css('information.css') ?> 
	<div class="tip-video">
		<div>
		<iframe class="video" src="https://www.youtube.com/embed/tS5jzLqhCzI" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="help-tip2">
			<div class="help-tip">
				<p>En esta página usted encontrará información general acerca de ambos recorridos, así como datos necesarios si desea realizarlos.</p>
			</div>
		</div>
		<div class=main-div2>
			<p>Esperamos que el recorrido sea de su agrado, algunas recomendaciones de seguridad:</p><br>
				<ol id="lista2">
				    <li>Utilizar sombrero o gorra y chaleco flotador</li>
				    <li>Proteger la piel con bloqueador solar</li>
				    <li>Mantenerse en su asiento durante el viaje</li>
				    <li>Evitar sacar los brazos o piernas del bote</li>
				    <li>Bajarse del bote solo si el botero se lo indica</li> 
				</ol>
		</div>
	
	<!-- <div id="wrapper_pantalla">
		<div id="wrapper_introduccion">

			<a!--Elemento lateral de navegacion-s-a>
			<nav class="col-sm-3" id="scroll_item">
				<ul class="nav nav-pills nav-stacked">
					<li><a class="nav_item" href="#estilo1"></a></li>
					<li><a class="nav_item" href="#estilo2"></a></li>
				</ul>
			</nav>

		<div class="wrapper_introduccion_texto">
		
		</div>
		</div>
	</div>-->
	</div>
	
<!--
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
	</script>-->