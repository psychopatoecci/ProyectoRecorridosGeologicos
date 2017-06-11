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

<style>
	#botonEliminar {
		color: red;
	}

	#recSeguridad {
		margin-bottom: 12px;
	}

	#botonAgregar {
		margin-bottom: 12px;
	}

</style>

<title>
    <?php echo $title; ?>
</title>

<?= $this->Html->css('description.css') ?> 


	<div class="tip-video">
		<div>
		<iframe width="100%" height="345" src="<?php echo $url[0]->link_path;?>" align="left"></iframe>	
		</div>
		<div class="help-tip2">
			<div class="help-tip">
				<p>En esta página usted encontrará información general acerca de ambos recorridos, así como datos necesarios si desea realizarlos.</p>
			</div>
		</div>
		
		<form method="post" action="/admin/modifyDescription">
		<div class="form-group">
		  <label>URL:</label>
		  <input type="text" class="form-control" id="videoURL" name="videoURL" value="<?php echo $url[0]->link_path;?>">
		</div>		
		
		<div class="form-group">
		  <label>Título de sugerencias:</label>
		  <input type="text" class="form-control" id="tituloSugerencias" name="tituloSugerencias" value="<?php echo $text[0]->description; ?>">
		</div>
				

		<label>Recomendaciones de seguridad:</label>
		<div class="input_fields_wrap">
			<button type="button" class="btn btn-success" id="botonAgregar">Agregar</button>
			<?php for($i = 1; $i < count($text); $i++): ?>    
			    <div id="recSeguridad"><input type="text" class="form-control" name="<?php echo uniqid(); ?>" id="<?php echo uniqid(); ?>" value="<?php echo $text[$i]->description; ?>"><a href="#" class="remove_field" id="botonEliminar">Eliminar</a></div>
			<?php endfor; ?>
		</div>
		<input type="submit" value="Submit">
		</form>

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
            $(wrapper).append('<div id="recSeguridad"><input type="text" class="form-control" name="<?php echo uniqid(); ?>'+x+'" id="<?php echo uniqid(); ?>'+x+'"/><ahref="#" class="remove_field" id="botonEliminar">Eliminar</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); 
    	if($("div[id*='recSeguridad']").length > min_length){
        	$(this).parent('div').remove(); x--;
    	}else{
    		this.blur();
    		alert("No puede eliminar más recomendaciones de seguridad");
    	}
    })
});
</script>
