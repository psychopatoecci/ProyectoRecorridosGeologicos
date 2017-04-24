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
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

	<?= $this->Html->script('jquery-3.2.0.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>		
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('base.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
   <div class="background">
		<header class="row ">
			<div class="row header-title" >
				<div class="col-sm-12 col-md-12 ">
					   <a title="Universidad de Costa Rica" href="https://www.ucr.ac.cr/"><img src="/img/logo_ucr.png" alt="logo_ucr"  align="left" /></a>
					   <a title="A traves de la historia geológica" href="/"><img src="/img/logo_aplicacion.png" alt="logo_aplicacion" align="right" /></a>
				</div> 
			</div>
		</header>

		<div class="container-fluid">  
			<nav class="navbar navbar-inverse">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-4">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="navbar-collapse-4">
						<ul class="nav navbar-nav navbar-left">
							<li><?= $this->Html->link ('<span class="glyphicon glyphicon-home">&#8194;</span>Inicio',['controller'=>'pages','action'=> 'home'],['escape' => false]);?></li>
							<li><?= $this->Html->link ('<span class="glyphicon glyphicon-info-sign">&#8194;</span>Información',['controller'=>'pages','action'=> 'information'],['escape' => false]);?></li>
							<li class="dropdown" id="accountmenu">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-map-marker">&#8194;</span>Recorridos<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Descripción general',['controller'=>'pages','action'=> 'description'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Recorrido 1',['controller'=>'pages','action'=> 'first_tout'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Recorrido 2',['controller'=>'pages','action'=> 'second_tour'],['escape' => false]);?></li>
									</ul>
							</li>
							<li><?= $this->Html->link ('<span class="glyphicon glyphicon-picture">&#8194;</span>Galería',['controller'=>'pages','action'=> 'gallery'],['escape' => false]);?></li>
							<li><?= $this->Html->link ('<span class="glyphicon glyphicon-user">&#8194;</span>Contacto',['controller'=>'pages','action'=> 'contact'],['escape' => false]);?></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>


    <?= $this->Flash->render() ?>

	<article>
		<div style="min-height: 65vh;"> 
			<?= $this->fetch('content') ?>
		</div>
	</article>


	<div id="footer">
		<div class="container">
			<div class="row">
				<br>
				<div class="col-md-4">
					<center>
						<a title="Centro de Investigaciones en Ciencias Geológicas" href="http://www.cicg.ucr.ac.cr/"><img src="/img/logo_cicg.png" alt="logo_cicg" /></a>
						<br>
						<h4 class="footertext">Centro de Investigaciones en Ciencias Geológicas</h4>
						<p class="footertext">Unidad de investigación dedicada al estudio de los procesos geológicos.<br>
					</center>
					<p>&nbsp;</p>
				</div>
				<div class="col-md-4">
					<center>
						<a title="Museo de la Universidad de Costa Rica" href="http://museo.ucr.ac.cr/"><img src="/img/logo_museo.png" alt="logo_museo" /></a>
						<br>
						<h4 class="footertext">Museo de la Universidad de Costa Rica</h4>
						<p class="footertext"> Unidad de investigación que adquiere, conserva, investiga y exhibe el patrimonio natural y cultural.<br>
					</center>
					<p>&nbsp;</p>
				</div>
				  
				<div class="col-md-4">
					<center>
						<a title="Facebook" href="/"><img src="/img/logo_facebook.png" alt="facebook" /></a>
						<a title="Twitter" href="/"><img src="/img/logo_twitter.png" alt="twitter" /></a>
						<br>
						<h4 class="footertext">Redes Sociales </h4>
						<p class="footertext">Puede seguinos en redes sociales como Facebook y Twitter.<br>
						<br>
					</center>
				</div>
				 
			</div>
		</div>
		<div class = "derechos"> &#9400;&#8194;2017 Centro de Investigaciones en Ciencias Geológicas </div>
	</div>
</div>
</body>

</html>

