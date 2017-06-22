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

<?= $this->Html->css('adminDescription.css') ?>


<div class="help-tip">
	<p>
		En esta página usted podrá modificar la información general acerca de ambos recorridos.
	</p>
</div>

<div class="container-fluid">
<div class="container" style=" padding:25px;">
<div id="form">
	<div class = "page-header" >   
		<h2><?php echo $title; ?></h2>
	</div> 

	<div class="page-header" style="padding-left: 10px;">
        <h3>
          Modificar Vídeo
        </h3>
    </div>	
	<div class="tip-video">
		<div>
		<iframe width="100%" height="345" src="<?php echo $url[0]->link_path;?>" align="left"></iframe>	
		</div>
		
		<form method="post" action="/admin/description" name="formDescripcion" onsubmit="return validateForm()">
		<div class="form-group">
		  <label>URL:</label>
		  <input type="url" class="form-control" id="videoURL" name="videoURL" value="<?php echo $url[0]->link_path;?>">
		</div>		
		
		<div class="form-group">
		  <label>Título de sugerencias:</label>
		  <input type="text" class="form-control" id="tituloSugerencias" name="tituloSugerencias" value="<?php echo $text[0]->description; ?>">
		</div>
				

    <div class="page-header" style="padding-left: 10px;">
        <h3>
          Modificar recomendaciones de Seguridad
        </h3>
    </div>
		<div class="input_fields_wrap">
			<button type="button" class="btn btn-success" id="botonAgregar" style="background-color : #3299bb; border-color : #3299bb;">Agregar</button>
			<?php for($i = 1; $i < count($text); $i++): ?>    
			    <div id="recSeguridad"><input type="text" class="form-control" name="<?php echo uniqid(); ?>" id="<?php echo uniqid(); ?>" value="<?php echo $text[$i]->description; ?>"> <button href="#" class="btn btn-danger" id="botonEliminar">Eliminar</button></div>
			<?php endfor; ?>
		</div>
		<input type="submit" class="btn btn-primary" value="Aceptar" style="background-color : #3299bb; border-color : #3299bb;">
		<button type="button" class="btn btn-danger" onclick="cancel()"> Cancelar </button>
		</form>
</div>

</div>
</div>

<script>
$(document).ready(function() {
	var max_fields 			= $("div[id*='recSeguridad']").length;
    var max_fields      	= 8 - max_fields; 
    var wrapper     	    = $(".input_fields_wrap"); //Fields wrapper    
    var add_button 	     	= $("#botonAgregar"); //Add button ID
    var current_length 		= $("div[id*='recSeguridad']").length;
    var min_length			= 4;

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div id="recSeguridad"><input type="text" class="form-control" name="<?php echo uniqid(); ?>'+x+'" id="<?php echo uniqid(); ?>'+x+'"/><button href="#" class="btn btn-danger" id="botonEliminar">Eliminar</button></div>'); //add input box
        }
    });
    
    $(wrapper).on("click","#botonEliminar", function(e){ //user click on remove text
    	e.preventDefault(); 
    	if($("div[id*='recSeguridad']").length > min_length){
        	$(this).parent('div').remove(); x--;
    	}else{
    		this.blur();
    		alert("No puede eliminar más recomendaciones de seguridad");
    	}
    })
});

function cancel() {
    location.reload();
}


function validateForm() {
    var x = document.forms["formDescripcion"]["tituloSugerencias"].value;
    if (x == "") {
        alert("El campo del título no puede estar vacío");
        return false;
    }

    url = document.forms["formDescripcion"]["videoURL"].value;

    if (url == "") {
        alert("El campo del URL no puede estar vacío");
        return false;
    }
    
        if (url != undefined || url != '') {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
            var match = url.match(regExp);
            if (match && match[2].length == 11) {
                return true;
            }
            else {                
                alert("El URL debe ser de YouTube");
                return false;
            }
        }


}


</script>
