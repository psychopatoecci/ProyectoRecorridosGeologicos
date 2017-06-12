
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
    	<?php echo $title; ?>
	</title>

    <?= $this->Html->meta('icon') ?>

	<?= $this->Html->script('jquery-3.2.0.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>		
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('baseAdmin.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->script('jquery-3.2.0.min') ?>

</head>

<body>
   <div class="background">
		<header class="row ">
			<div class="row header-title" >
				<div class="col-sm-12 col-md-12">
						<a  title="Universidad de Costa Rica" href="https://www.ucr.ac.cr/"><img class ="img_ucr_responsive" src="/img/logo_ucr_full_responsive.png" alt="logo_aplicacion"/></a>
						<a  title="A traves de la historia geológica" href="/"><img class ="img_app_responsive" src="/img/logo_aplicacion_full_responsive.png" alt="logo_aplicacion"/></a>
					   <a title="Universidad de Costa Rica" href="https://www.ucr.ac.cr/"><img class ="img_ucr" src="/img/logo_ucr.png" alt="logo_ucr" /></a>
					   <a title="A traves de la historia geológica" href="/"><img class ="img_app" src="/img/logo_aplicacion.png" alt="logo_ucr"/></a>

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
							<li class = "<?php if ( $_SERVER['REQUEST_URI'] === '/admin/home' || $_SERVER['REQUEST_URI'] === '/' ) {echo "active"; } else  {echo "noactive";}?>"> <?= $this->Html->link ('<span class="glyphicon glyphicon-home">&#8194;</span>Inicio',['controller'=>'admin','action'=> 'home'],['escape' => false]);?></li>
							<li class = "<?php if ( $_SERVER['REQUEST_URI'] === '/admin/information' ) {echo "active"; } else  {echo "noactive";}?>"><?= $this->Html->link ('<span class="glyphicon glyphicon-info-sign">&#8194;</span>Información',['controller'=>'admin','action'=> 'information'],['escape' => false]);?></li>
							<li class="dropdown" id="accountmenu">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-map-marker">&#8194;</span>Recorridos<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Descripción general',['controller'=>'admin','action'=> 'description'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Isla Bolaños',['controller'=>'admin','action'=> 'tourBolanos'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Península de Santa Elena',['controller'=>'admin','action'=> 'tourSantaElena'],['escape' => false]);?></li>
									</ul>
							</li>
							<li class="dropdown" id="accountmenu">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-blackboard">&#8194;</span>Mapas<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Isla Bolaños',['1','controller'=>'admin','action'=> 'mapindex'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Península de Santa Elena',['2','controller'=>'admin','action'=> 'mapindex'],['escape' => false]);?></li>
									</ul>
							</li>
							<li class="dropdown" id="accountmenu">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-picture">&#8194;</span>Galería<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Isla Bolaños',['1','controller'=>'admin','action'=> 'gallery'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Península de Santa Elena',['2','controller'=>'admin','action'=> 'gallery'],['escape' => false]);?></li>
									</ul>
							</li>
							<li><?= $this->Html->link ('<span class="glyphicon glyphicon-eye-open">&#8194;</span>Ver cambios',['controller'=>$userController,'action'=> $userAction],['escape' => false]);?></li>
						</ul>
					</div>

				</div>
				<div "collapse navbar-collapse" id="navbar-collapse-4">
						<ul class = "nav navbar-nav navbar-right">
							<li><?= $this->Html->link ('<span class="glyphicon glyphicon-log-out">&#8194;</span>Cerrar sesión',['controller'=>'users','action'=> 'logout'],['escape' => false]);?></li>
						</ul>
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
						<a title="Vicerrectoría de Investigación" href="http://www.vinv.ucr.ac.cr/"><img src="/img/logo_vice.png" alt="logo_vice" /></a>
						<br>
						<h4 class="footertext">Vicerrectoría de Investigación</h4>
						<p class="footertext"> Ente responsable de supervisar, coordinar, estimular y divulgar la investigación en la Universidad de Costa Rica.<br>
					</center>
					<p>&nbsp;</p>
				</div>
				<div class="col-md-4">
					<center>
						<a title="Centro de Investigación en Ciencias Geológicas" href="http://www.cicg.ucr.ac.cr/"><img src="/img/logo_cicg.png" alt="logo_cicg" /></a>
						<br>
						<h4 class="footertext">Centro de Investigación en Ciencias Geológicas</h4>
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
				</div>
				 
			</div>
		</div>

	<div id="derechos">
		<div class="container">
			<div class="row">
				<br>
				<div class="col-md-6" style="padding-top: 6px;">
						<p class="footertext"> &copy;<em>&#8194;2017 Centro de Investigación en Ciencias Geológicas </em>
				</div>
				<div class="col-md-6" style="padding-bottom: 10px;">
				<center class="centering">	
					<a title="Facebook Oficial del Sitio" href="/"><img src="/img/logo_facebook_white.png" alt="logo_facebook"/></a>
					<a title="Canal Oficial de Youtube" href="/"><img src="/img/logo_youtube_white.png" alt="logo_youtube"/></a>
				</center>
				</div>

				 
			</div>
		</div>

	</div>
</div>
</body>

</html>


