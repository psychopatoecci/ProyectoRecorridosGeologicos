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

<?= $this->Html->css('tour.css') ?> 

<div class="help-tip">
	<p>En esta página usted encontrará información acerca de la península de Santa Elena y alrededores. Además, podrá obtener enlaces a documentos de interés y visualizar un mapa interactivo con los puntos del recorrido.</p>
</div>

<div id="wrapper_pantalla">

	<section class="wrapper" id="estilo1" style="background-image: url(<?=h($images[0]->link_path)?>);">
		
		<div class="container container_titulo">
			<div class="row">
				<div class="col-md-6" id="col_titulo">
					<p id="titulo">
						Península de Santa Elena y alrededores
					</p>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-4 pull-right">
					<p>
						<?php echo $text[0]->description; ?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 links">
						<p>
						<span class="glyphicon glyphicon-globe"></span>
						<?= $this->Html->link ('Ir al mapa',['2', 'controller'=>'pages','action'=> 'tour'],['escape' => false]);?>
						</p>
						<p id="subtitulo">
							Documentos relacionados
						</p>
						<p>
						<?php for ($i = 0; $i < sizeof($url); $i++) { ?>
						  	<span class="glyphicon glyphicon-file"></span>
							<a href="<?php echo $url[$i]->link_path; ?>" target='_blank'><?php echo $url[$i]->description; ?></a> 
							<br>
						<?php } ?>
						</p>
				</div>
			</div>
		</div>

	</section>
</div>
