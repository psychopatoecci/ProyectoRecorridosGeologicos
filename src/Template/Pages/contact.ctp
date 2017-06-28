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

$cakeDescription = 'Contacto';
?>
<!DOCTYPE html>

<?= $this->Html->css('description.css') ?> 

<style>
	#label {
		padding-top: 10px;
	}
	.btn {
		margin-top: 10px;	
	}
</style>

<div class="help-tip">
	<p>
		En esta página usted podrá enviarnos un mensaje.
	</p>
</div>

<div class="container-fluid">
<div class="container" style=" padding:25px;">
<div id="form">
	<div class = "page-header" >   
		<h2><?php echo $title; ?></h2>
	</div> 
		
	<form method="post" action="/pages/contact" name="formContact" onsubmit="return validateForm()">

    </div>
		<div class="input_fields_wrap">
			<label id="label"> Nombre <span style="color:red"> *</span></label>
			<input type="text" class="form-control" name="nombre" maxlength="30" id="nombre">

			<label id="label"> Correo electrónico <span style="color:red"> *</span></label>
			<input type="text" class="form-control" name="correo" maxlength="50">

			<label id="label"> Asunto <span style="color:red"> *</span></label>
			<input type="text" class="form-control" name="asunto" maxlength="50">

			<label id="label"> Mensaje <span style="color:red"> *</span></label>
			<textarea class="form-control" rows="4" cols="50" name="mensaje" maxlength="125"></textarea>
		</div>
		<input type="submit" class="btn btn-primary" value="Aceptar" style="background-color : #3299bb; border-color : #3299bb;">		
		</form>
</div>
</div>

<script>
function validateForm() {
    var nombre = document.forms["formContact"]["nombre"].value;
    var correo = document.forms["formContact"]["correo"].value;
    var asunto = document.forms["formContact"]["asunto"].value;
    var mensaje = document.forms["formContact"]["mensaje"].value;

    if (nombre == "" || correo == "" || asunto == "" || mensaje == "") {
        alert("Todos los campos son obligatorios");
        return false;
    }
}		
</script>