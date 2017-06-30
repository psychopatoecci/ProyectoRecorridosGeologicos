
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

    <?php echo $this->Html->meta(
    'ruta_geologica.ico',
    '/ruta_geologica.ico',
    array('type' => 'icon')
	);
	?>

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
		<header class="row">
			<div class="row header-title" >
				<div class="col-sm-12 col-md-12">
						<a  title="Universidad de Costa Rica" href="https://www.ucr.ac.cr/"><img class ="img_ucr_responsive" src="/img/logo_ucr_full_responsive.png" alt="logo_aplicacion"/></a>
						<a  title="A traves de la historia geológica" href="/"><img class ="img_app_responsive" src="/img/logo_aplicacion_full_responsive.png" alt="logo_aplicacion"/></a>
					   <a title="Universidad de Costa Rica" href="https://www.ucr.ac.cr/"><img class ="img_ucr" src="/img/logo_ucr.png" alt="logo_ucr" /></a>
					   <a title="A traves de la historia geológica" href="/"><img class ="img_app" src="/img/logo_aplicacion.png" alt="logo_ucr"/></a>

				</div> 
			</div>
		</header>
		<div class="barra_encabezado"></div>
		<div class="container-fluid">  
			<nav class="navbar navbar-inverse">
				<div class="container nav_element">
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
							<li class = "<?php if ( $_SERVER['REQUEST_URI'] === '/pages/home' || $_SERVER['REQUEST_URI'] === '/' ) {echo "active"; } else  {echo "noactive";}?>"> <?= $this->Html->link ('<span class="glyphicon glyphicon-home">&#8194;</span>Inicio',['controller'=>'pages','action'=> 'home'],['escape' => false]);?></li>
							<li class = "<?php if ( $_SERVER['REQUEST_URI'] === '/pages/information' ) {echo "active"; } else  {echo "noactive";}?>"><?= $this->Html->link ('<span class="glyphicon glyphicon-info-sign">&#8194;</span>Información',['controller'=>'pages','action'=> 'information'],['escape' => false]);?></li>
							<li class="dropdown" id="accountmenu">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-map-marker">&#8194;</span>Recorridos<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Descripción general',['controller'=>'pages','action'=> 'description'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Isla Bolaños',['controller'=>'pages','action'=> 'tourBolanos'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Península de Santa Elena',['controller'=>'pages','action'=> 'tourSantaElena'],['escape' => false]);?></li>
									</ul>
							</li>
							<li class="dropdown" id="accountmenu">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-picture">&#8194;</span>Galería<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Isla Bolaños',['1','controller'=>'pages','action'=> 'gallery'],['escape' => false]);?></li>
										<li><?= $this->Html->link ('<span class="glyphicon glyphicon-chevron-right">&#8194;</span>Península de Santa Elena',['2','controller'=>'pages','action'=> 'gallery'],['escape' => false]);?></li>
									</ul>
							</li>
							<li class = "<?php if ( $_SERVER['REQUEST_URI'] === '/pages/contact' ) {echo "active"; } else  {echo "noactive";}?>"><?= $this->Html->link ('<span class="glyphicon glyphicon-user">&#8194;</span>Contacto',['controller'=>'pages','action'=> 'contact'],['escape' => false]);?></li>
							<li class = "<?php if ( $_SERVER['REQUEST_URI'] === '/pages/about' ) {echo "active"; } else  {echo "noactive";}?>"><?= $this->Html->link ('<span class="glyphicon glyphicon-blackboard">&#8194;</span>Acerca de',['controller'=>'pages','action'=> 'about'],['escape' => false]);?></li>
						</ul>
			            <?php 
			                if ($this->request->session()->read('Auth.User')) {
			                    echo '<ul class = "nav navbar-nav navbar-right">
			                    <li>'.
			                    $this->Html->link ('<span class="glyphicon glyphicon-log-out">&#8194;</span>Cerrar sesión',['controller'=>'users','action'=> 'logout'],['escape' => false])
			                    .'</li></ul>';
			            } ?>
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
		<div class="row">
			<div class="col-md-3">
				<center>
					<a title="Centro de Investigación en Ciencias Geológicas" href="http://www.cicg.ucr.ac.cr/"><img src="/img/logo_cicg.png" alt="logo_cicg" /></a>
					<br>
					<h5 class="footertext">Centro de Investigación en Ciencias Geológicas</h5>
				</center>					
			</div>
			<div class="col-md-3" >
				<center>
					<a title="Museo de la Universidad de Costa Rica" href="http://museo.ucr.ac.cr/"><img src="/img/logo_museo.png" alt="logo_museo" /></a>
					<br>
					<h5 class="footertext">Museo de la Universidad de Costa Rica</h5>
				</center>	
			</div>
			<div class="col-md-3" >
				<center>
					<p>&nbsp;</p>
					<a title="Escuela de Ciencias de la Computación e Informática" href="http://www.ecci.ucr.ac.cr"><img src="/img/logo_ecci.png" alt="logo_ecci" /></a>
					<br>
					<p>&nbsp;</p>
					<h5 class="footertext">Escuela de Ciencias de la Computación e Informática</h5>
				</center>
			</div>
			<div class="col-md-3" >
				<center>
					<a title="Área de Conservación Guanacaste" href="https://www.acguanacaste.ac.cr"><img src="/img/logo_acg.png" alt="logo_acg" style="margin-top: 12px;" /></a>
					<br>
					<h5 class="footertext">Área de Conservación Guanacaste</h5>
				</center>					
			</div>
		</div>
	</div>

	<div id="footer_responsive_1">
		<div class="row">
				<div class="col-md-6 responsive_1">
					<center>
						<a title="Centro de Investigación en Ciencias Geológicas" href="http://www.cicg.ucr.ac.cr/"><img src="/img/logo_cicg.png" alt="logo_cicg" /></a>
						<br>
						<h5 class="footertext barra">Centro de Investigación en Ciencias Geológicas</h5>
					</center>					
				</div>
				<div class="col-md-6 responsive_1">
					<center>
						<a title="Museo de la Universidad de Costa Rica" href="http://museo.ucr.ac.cr/"><img src="/img/logo_museo.png" alt="logo_museo" /></a>
						<br>
						<h5 class="footertext barra ">Museo de la Universidad de Costa Rica</h5>
					</center>	
				</div>
		</div>
		<div class="row">
				<div class="col-md-6 responsive_1">
					<center>
						<p>&nbsp;</p>
						<a title="Escuela de Ciencias de la Computación e Informática" href="http://www.ecci.ucr.ac.cr"><img src="/img/logo_ecci.png" alt="logo_ecci" /></a>
						<br>
						<p>&nbsp;</p>
						<h5 class="footertext barra">Escuela de Ciencias de la Computación e Informática</h5>
					</center>
				</div>
				<div class="col-md-6 responsive_1">
					<center>
						<a title="Área de Conservación Guanacaste" href="https://www.acguanacaste.ac.cr"><img src="/img/logo_acg.png" alt="logo_acg" /></a>
						<br>
						<h5 class="footertext barra">Área de Conservación Guanacaste</h5>
					</center>					
				</div>
		</div>
	</div>

	<div id="derechos">
			<div class="row">
				<br>
				<div class="col-md-6 derechos_reservados_left" >
						<p class="footertext derechos_text"> &copy;<em>&#8194;2017 Centro de Investigación en Ciencias Geológicas </em></p>
				</div>
				<div class="col-md-6 derechos_reservados_right" style="padding-bottom: 10px;">
				<center class="centering">	
					<a title="Facebook Oficial del Sitio" href="https://www.facebook.com/cicg.ucr?ref=br_tf "><img src="/img/logo_facebook_white.png" alt="logo_facebook" style="margin-left: 5px;"/></a>
					<a title="Canal Oficial de Youtube" href="https://www.youtube.com/channel/UCoJROKhqBJk-3t6pOMktXnA"><img src="/img/logo_youtube_white.png" alt="logo_youtube"/></a>
				</center>
				</div>
			</div>
	</div>
</div>
</body>

</html>
