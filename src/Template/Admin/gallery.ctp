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

<?= $this->Html->script('jquery.magnific-popup.js') ?> 
<?= $this->Html->css('magnific-popup.css') ?> 
<?= $this->Html->css('admin.css') ?>
<?= $this->Html->css('mapadd.css') ?>

<script>
	var actual_img = 0; 
	var siguiente_img = 1;
	var elementos_img_old = new Array();
	var elementos_img_new = new Array();
	
	function agregarImagenNueva(id_data){

		var id = id_data.substr(1);
		var name_image = document.getElementById("container_image_new_name" + actual_img).value;	
	    var content_image = document.getElementById("container_path_new_image" + actual_img).value;	
		var content_image_name = document.getElementById("container_image_name" + actual_img).value;	

		if(content_image_name.match(/([a-zA-Z0-9]|( )|(-)|(\.)|(_))*/)[0] != content_image_name){
			
			console.log(content_image_name);
			$("#validate_content_image_"+ actual_img + " p" ).remove();
			$("#validate_content_image_" + actual_img).append("<p style = \"color:red; font-weight: bold;\">*El campo de la imagen no puede contener caracteres especiales</p> ");
			setTimeout(function() { $("#validate_content_image_" + actual_img +" p").fadeOut(); }, 1500); 
			setTimeout(function(){$("#validate_content_image_" + actual_img +" p").remove(); }, 100000);
			if (name_image == "") {
		    	$("#validate_name_image_"+ actual_img + " p" ).remove();
		    	$("#validate_name_image_" + actual_img).append("<p style = \"color:red; font-weight: bold;\">*El nombre de la imagen no puede ser un campo vacio</p> ");
	    		setTimeout(function() { $("#validate_name_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_image_" + actual_img +" p").remove(); }, 100000);
		    }
		    else
		    {
		       $("#validate_name_image_"+ actual_img + " p" ).remove();
		    	$("#validate_name_image_" + actual_img).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ");
	    		setTimeout(function() { $("#validate_name_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_image_" + actual_img +" p").remove(); }, 100000);
		    }
		}
		else if(content_image == ""  || name_image == "") {
		   	if (name_image == "") {
		    	$("#validate_name_image_"+ actual_img + " p" ).remove();
		    	$("#validate_name_image_" + actual_img).append("<p style = \"color:red; font-weight: bold;\">*El nombre de la imagen no puede ser un campo vacio</p> ");
	    		setTimeout(function() { $("#validate_name_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_image_" + actual_img +" p").remove(); }, 100000);
		    }
		    else
		    {
		       $("#validate_name_image_"+ actual_img + " p" ).remove();
		    	$("#validate_name_image_" + actual_img).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ");
	    		setTimeout(function() { $("#validate_name_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_image_" + actual_img +" p").remove(); }, 100000);
		    }

		    if (content_image == "" ) {
		    	$("#validate_content_image_"+ actual_img + " p" ).remove();
		    	$("#validate_content_image_" + actual_img).append("<p style = \"color:red; font-weight: bold;\">*El campo de la imagen no puede ser un vacio</p> ");
	    		setTimeout(function() { $("#validate_content_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_content_image_" + actual_img +" p").remove(); }, 100000);
		    }
		    else
		    {
		    	$("#validate_content_image_"+ actual_img + " p" ).remove();
		    	$("#validate_content_image_" + actual_img).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ");
	    		setTimeout(function() { $("#validate_content_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_content_image_" + actual_img +" p").remove(); }, 100000);	
		    }
		}
		else 
		{
			elementos_img_new.push(parseInt(id));
			document.getElementById("container_image_new_name" + id).setAttribute("name", "container_image_new[" + id + "][0]");
			document.getElementById("container_path_new_image" + id).setAttribute("name", "container_image_new[" + id + "][1]");
			document.getElementById("container_image_new_name" + id).setAttribute("id", "container_image_new[" + id + "][0]");
			document.getElementById("container_path_new_image" + id).setAttribute("id", "container_image_new[" + id + "][1]");
			
			document.getElementById("element_row_" + id).style.display = "none";
			document.getElementById("container_image_temp" + id).style.display = "none";
			document.getElementById("i"+id).style.display = "none";
			
			var buttonVer = "<button class = \"btn btn-info\" onclick = \" verImagen('" + document.getElementById("container_image_temp" + id).value + "');\" type=\"button\" style = \"font-size:12px; margin-top: 25px; margin-right: 3px;\"> Ver </button>" ;
			var buttonEliminar = "<button class = \"btn btn-danger\" onclick = \" eliminarImagenNueva('" + id + "');\" type=\"button\" style=\"font-size:12px; margin-top: 25px; \"> Eliminar  </button>" ;

			$("#element_row_buttons_" + id).append(buttonVer);
			$("#element_row_buttons_" + id).append(buttonEliminar);
			$("#leyenda_imagenes_" + id).remove();

			siguiente_img = elementos_img_new.length;
			actual_img = siguiente_img;
			
			var nuevoElemento = 
				"<div id =\"content_image_" + siguiente_img + "\" style=\"margin-top:10px; margin-bottom:10px;\">" +
					"<div class=\"row\" id =\"row_imagen_" + siguiente_img + "\">" +
						"<div class=\"col-sm-5\">" +
							"<label><font color=\"red\"></font>Nombre </label>" +
							"<input class = \"info_name_image\" type=\"text\" id=\"container_image_new_name" + siguiente_img + "\" placeholder=\"Ingrese el nombre de la imagen\"/>" +
							"<span class=\"error\" aria-live=\"polite\" id =\"validate_name_image_"+siguiente_img+"\"> </span>"+
						"</div>" +
						"<div class=\"col-sm-5\">" +
							"<div><label><font color=\"red\"></font>Imagen </label></div>" +
							"<input class = \"info_data_image\" id=\"container_image_name" + siguiente_img + "\" placeholder=\"Seleccione un archivo\"  style=\"background-color=white;\" readonly/>" +
								"<span class=\"error\" aria-live=\"polite\" id =\"validate_content_image_"+siguiente_img+"\"></span>"+
							"<input class = \"info_data_image\" id=\"container_image_temp" + siguiente_img + "\" placeholder=\"Seleccione un archivo\" disabled=\"disabled\" style = \"display:none;\"/>" +
								"<div class=\"fileUpload btn btn-primary\" id = \"element_row_" + siguiente_img + "\" style =\"margin-top: 15px; font-size:12px;\">" + 
									"<span class=\"glyphicon glyphicon-upload\"> </span> Subir imagen" +
									"<input type=\"file\" class = \"upload_image\" multiple=\"multiple\" id=\"container_path_new_image" + siguiente_img + "\" value=\"image_temp\" accept=\"image/*\"  onchange=\"loadFile(event, " + siguiente_img + ")\">" +
								"</div>" +
						"</div>" +
						"<div class=\"col-sm-2\" id=\"element_eliminar_button" + siguiente_img + "\">" + 
							"<button class=\"btn btn-success\" style =\"margin-top: 25px; font-size:12px; background-color: #3299bb; border-color: #3299bb;\" type=\"button\" id=\"i" + siguiente_img + "\" onclick=\"agregarImagenNueva(this.id)\"><span class=\"glyphicon glyphicon-plus\" ></span> Agregar</button>" +
						"</div>" + 
						"<div class=\"col-sm-2\" style=\"margin-bottom:20px;\" id = \"element_row_buttons_" + siguiente_img + "\"> </div>" + 
					"</div>" +
					"<div id=\"leyenda_imagenes_" + siguiente_img+ "\">" +
					"<div class = \"page-header\" >"   +
						"<h4>Imagenes agregadas</h4>"+
					"</div>" +
				"</div>";
		
			$("#content_image_" + id).before(nuevoElemento);
		}
	}
	
	function eliminarImagenNueva(id){
		console.log(elementos_img_old);
		console.log(elementos_img_new);

		document.getElementById("content_image_" + id).style.display = "none";
		document.getElementById("container_image_new[" + id + "][0]").setAttribute("name", "removed");
		document.getElementById("container_image_new[" + id + "][1]").setAttribute("name", "removed");

		var index = elementos_img_new.indexOf(parseInt(id));
		if (index > -1) {
		    elementos_img_new.splice(index, 1);
		}

		console.log(elementos_img_old);
		console.log(elementos_img_new);

		if (elementos_img_new.length == 0 && elementos_img_old.length == 0)
		{
			 $("#leyenda_imagenes_" + actual_img).append("<p id =\"leyenda_imagenes_p_" + actual_img +"\" align=\"middle\"> No existen ninguna imagen agregada</p>");
		}
	}
	
	function agregarImagen(id, nombre, imagen){
		var element = 	
			"<div id=\"initial" + id + "\" >" +
				"<div class=\"row\">" +
					"<div class=\"col-sm-5\">" +
						"<label><font color=\"red\"></font>Nombre </label>" +
						"<input class = \"info_name_image\" type=\"text\" name=\"container_image["+ id +"][0]\" id=\"container_image["+ id +"][0]\" value=\"" + nombre + "\"/>" +
					"</div>" +
					"<div class=\"col-sm-5\">" +
						"<div><label><font color=\"red\"></font>Imagen </label></div>" +
						"<input class = \"info_data_image\" name=\"container_image[" + id +"][1]\" id=\"container_image[" + id +"][1]\" value=\"" + imagen + "\" readonly/>" +
					"</div>" +
					"<div class=\"col-sm-2\">" +
						"<button class = \"btn btn-info\" onclick = \" verImagen('" + imagen + "');\" type=\"button\"  style=\"margin-top:25px; margin-right:3px; font-size: 12px;\" > Ver </button>" +
						"<button class=\"btn btn-danger\" type=\"button\" style=\"margin-top:25px; font-size: 12px;\" name=\"initial\" id=\"" + id + "\" onclick=\"eliminarImagen(this.id)\" > Eliminar</button>" +
					"</div>" +
				"</div>" +

			"</div>";

		$("#contentImage").prepend(element);
		$("#leyenda_imagenes_p_" + actual_img ).remove();
		elementos_img_old.push(parseInt(id));
	}
	
	function eliminarImagen(id){

		console.log(elementos_img_old);
		console.log(elementos_img_new);

		console.log(document.getElementById("initial" + id));
		nombre = document.getElementById("container_image[" + id + "][0]").value;
		imagen = document.getElementById("container_image[" + id + "][1]").value;
		document.getElementById("initial" + id).innerHTML = 
		"<div id=\"initial" + id + "\"  style=\"display:none;\" >" +
			"<div class=\"col-sm-5\">" +
				"<label><font color=\"red\"></font>Nombre </label>" +
				"<input class = \"info_name_image\" type=\"text\" name=\"container_image_delete["+ id +"][0]\" value=\"" + nombre + "\"/>" +
			"</div>" +
			"<div class=\"col-sm-5\">" +
				"<div><label><font color=\"red\"></font>Imagen </label></div>" +
				"<input class = \"info_data_image\" name=\"container_image_delete[" + id +"][1]\" value=\"" + imagen + "\"/>" +
			"</div>" +
		"</div>";

		var index = elementos_img_old.indexOf(parseInt(id));
		if (index > -1) {
		    elementos_img_old.splice(index, 1);
		}

		console.log(elementos_img_old);
		console.log(elementos_img_new);

		if (elementos_img_new.length == 0 && elementos_img_old.length == 0)
		{
			 $("#leyenda_imagenes_" + actual_img).append("<p id =\"leyenda_imagenes_p_" + actual_img +"\" align=\"middle\"> No existen ninguna imagen agregada</p>");
		}
	}
	
	var loadFile = function(event,id){
		var output = document.getElementById('container_path_new_image' + id);
		document.getElementById('container_image_temp' + id).value = URL.createObjectURL(event.target.files[0]);
		document.getElementById('container_image_name'+ id).value =  output.files[0].name;
 	};
	
	function verImagen(url_image){
	    var data_point = new Array();
	    data_point.push({src:url_image}); 
	    $.magnificPopup.open({
			items: data_point,
			gallery: {
				enabled: true
			},
			type: 'image' 
	    });
	}
</script>

<div class="help-tip">
	<p>Esta página le permite administrar el contenido de la galería de los recorridos: puede modificar la descripción de una imagen, eliminarla o agregar una nueva imagen.</p>
</div>

<div class="container-fluid">
	<div class="container" style=" padding:25px;">
		<div class = "page-header" >   
			<h2><?php echo $title; ?></h2>
		</div> 
		<form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" action="/admin/gallery/<?php echo $galleryId ?>" novalidate>
			<!--
			
							Imágenes de la galería
			
			-->

			<div id="contenido_imagenes">
				<!-- Imagen por agregar -->
				<div id ="content_image_0" style="margin-top:10px; margin-bottom:10px;">
					<div class="row" id ="row_imagen_0">
						<div class="col-sm-5">
							<label><font color="red"></font>Nombre </label>
							<input class = "info_name_image" type="text" id="container_image_new_name0" placeholder="Ingrese el nombre de la imagen"/>
							<span class="error" aria-live="polite" id ="validate_name_image_0"> </span>
						</div>
						<div class="col-sm-5">
							<div><label><font color="red"></font>Imagen </label></div>
							<input class = "info_data_image" id="container_image_name0" placeholder="Seleccione un archivo" style="background-color=white;" readonly />
							<span class="error" aria-live="polite" id ="validate_content_image_0"></span>
							<input class = "info_data_image" id="container_image_temp0" placeholder="Seleccione un archivo" disabled="disabled" style = "display:none;"/>
							<div class="fileUpload btn btn-primary" id = "element_row_0" style ="margin-top:15px; font-size: 12px; background-color: #3299bb; border-color: #3299bb;">
								<span class="glyphicon glyphicon-upload"> </span> Subir imagen
								<input type="file"  class = "upload_image" multiple="multiple" id="container_path_new_image0" value="image_temp" accept="image/*"  onchange="loadFile(event, 0)">
							</div>
						</div>
						<div class="col-sm-2" style="margin-bottom:20px;" id = "element_row_buttons_0"> </div>
						<div class="col-sm-2" id="element_eliminar_button0">
							<button class="btn btn-success" style =" font-size: 12px; background-color: #3299bb; border-color: #3299bb;" type="button" id="i0" onclick="agregarImagenNueva(this.id)"><span class="glyphicon glyphicon-plus" ></span> Agregar</button>
						</div>
					</div>
					<div id="leyenda_imagenes_0">
						<div class = "page-header" >
							<h4>Imagenes agregadas</h4>
						</div>
						<p id ="leyenda_imagenes_p_0" align="middle"> No existen ninguna imagen agregada</p>
					</div>
				</div>
				
				<!-- Imágenes del punto -->
				<div id="contentImage">
					<?php foreach ($images as $contentImage): ?>
						<script>
							agregarImagen("<?php echo $contentImage->id ?>", "<?php echo $contentImage->description ?>", "<?php echo $contentImage->link_path ?>");
						</script>
					<?php endforeach; ?>
				</div>
			</div>
			
			<!-- Modificar las imágenes de la galería -->
			
			<div class="row" style = "margin-top: 35px;">
				<div class="col-sm-6">
					<button class="btn btn-primary"  type="submit" >Guardar</button>       
					<button class="btn btn-danger"  type="button" onclick="window.location.href='/admin/gallery/<?php echo $galleryId ?>'">Cancelar</button>       
				</div>
			</div>
		</form>
	</div>
</div>

<style type="text/css">
    
.table-responsive {
    padding-right: 20px;
    padding-left: 20px;
}

.page-header {
    padding-bottom: 9px;
    margin: 40px 20px 20px;
    border-bottom: 1px solid #eee;
}

.table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #FAFAFA;
}
</style>