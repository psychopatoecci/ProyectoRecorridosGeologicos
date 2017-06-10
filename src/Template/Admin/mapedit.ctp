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

<script>
	var siguiente_img = 1;
	var elementos_img_new = new Array();
	
	function agregarImagenNueva(id){
		elementos_img_new.push(id);
		document.getElementById("container_image_new_name" + id).setAttribute("name", "container_image_new["+ id +"][0]");
		document.getElementById("container_path_new_image" + id).setAttribute("name", "container_image_new["+ id +"][1]");
		
		document.getElementById("container_image_temp"+id).style.display = "none";
		document.getElementById(id).style.display = "none";
		
		var buttonVer = "<button class = \"btn btn-info\" onclick = \" verImagen('" + document.getElementById("container_image_temp" + id).value + "');\" type=\"button\" style=\"margin-top:10px; margin-right:10px;\"> Ver </button>";
		var buttonEliminar = "<button class = \"btn btn-danger\" onclick = \" eliminarImagenNueva('" + id + "');\" type=\"button\" style=\"float:left; position:relative; margin-top: 25px; \"><span class=\"glyphicon glyphicon-remove\"></span> Eliminar  </button>" ;
		$("#element_row_buttons_" + id).append(buttonVer);
		$("#element_eliminar_button" + id).append(buttonEliminar);
		
		siguiente_img = elementos_img_new.length;
		
		var nuevoElemento = 
			"<div id =\"content_image_" + siguiente_img + "\" style=\"margin-top:10px; margin-bottom:10px;\">" +
				"<div class=\"row\" id =\"row_imagen_" + siguiente_img + "\">" +
					"<div class=\"col-sm-5\">" +
						"<label><font color=\"red\"></font>Nombre </label>" +
							"<input class = \"info_name_image\" type=\"text\" id=\"container_image_new_name" + siguiente_img + "\" placeholder=\"Ingrese el nombre de la imagen\"/>" +
					"</div>" +
					"<div class=\"col-sm-5\">" +
						"<div><label><font color=\"red\"></font>Imagen </label></div>" +
						"<input class = \"info_data_image\" id=\"container_image_name" + siguiente_img + "\" placeholder=\"Seleccione un archivo\"  style=\"background-color=white;\" readonly/>" +
						"<input class = \"info_data_image\" id=\"container_image_temp" + siguiente_img + "\" placeholder=\"Seleccione un archivo\" disabled=\"disabled\" style = \"display:none;\"/>" +
						"<div class=\"col-sm-2\">" +
							"<div class=\"fileUpload btn btn-primary\" id = \"element_row_" + siguiente_img + "\" style =\"margin-top: 15px;\">" + 
								"<span>Subir</span>" +
								"<input type=\"file\" class = \"upload_image\" multiple=\"multiple\" id=\"container_path_new_image" + siguiente_img + "\" value=\"image_temp\" accept=\"image/*\"  onchange=\"loadFile(event, " + siguiente_img + ")\">" +
							"</div>" +
						"</div>" +
					"</div>" +
					"<div class=\"col-sm-2\" id=\"element_eliminar_button" + siguiente_img + "\">" + 
						"<button class=\"btn btn-success\" style =\"margin-top: 25px;\" type=\"button\" id=\"" + siguiente_img + "\" onclick=\"agregarImagenNueva(this.id)\"><span class=\"glyphicon glyphicon-plus\" ></span> Agregar</button>" +
					"</div>" + 
				"</div>" +
				"<div class=\"row\">" +
					"<div class=\"col-sm-5\" style=\"margin-bottom:20px;\" id = \"element_row_buttons_" + siguiente_img + "\"> </div>" +
				"</div>";
	
		$("#content_image_" + id).before(nuevoElemento);
	}
	
	function eliminarImagenNueva(id){
		document.getElementById("content_image_" + id).style.display = "none";
	}
	
	function agregarImagen(id, nombre, imagen){
		var element = 	
			"<div id=\"initial" + id + "\" >" +
				"<div class=\"col-sm-5\">" +
					"<label><font color=\"red\"></font>Nombre </label>" +
					"<input class = \"info_name_image\" type=\"text\" name=\"container_image["+ id +"][0]\" id=\"container_image["+ id +"][0]\" value=\"" + nombre + "\"/>" +
				"</div>" +
				"<div class=\"col-sm-5\">" +
					"<div><label><font color=\"red\"></font>Imagen </label></div>" +
					"<input class = \"info_data_image\" name=\"container_image[" + id +"][1]\" id=\"container_image[" + id +"][1]\" value=\"" + imagen + "\"/>" +
				"</div>" +
				"<div class=\"col-sm-2\">" +
					"<div><label></label></div>" +
					"<button class=\"btn btn-danger\" type=\"button\" style =\"margin-top: 5px;\" name=\"initial\" id=\"" + id + "\" onclick=\"eliminarImagen(this.name, this.id)\" ><span class=\"glyphicon glyphicon-remove\"></span> Eliminar</button>" +
				"</div>" +
				"<div class=\"row\">" +
					"<div class=\"col-sm-2\">" +
						"<button class = \"btn btn-info\" onclick = \" verImagen('" + imagen + "');\" type=\"button\" style=\"margin-top:10px; margin-right:10px;\"> Ver </button>" +
					"</div>" + 
				"</div>" + 
			"</div>";

			$("#contentImage").prepend(element);
	}
	
	function eliminarImagen(name, id){
		if(name == "initial"){
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
	<p>Esta página le permite administrar el contenido de los mapas de los recorridos: puede agregar un nuevo punto con su respectivo contenido (imagenes y videos).</p>
</div>

<div class="container-fluid">
	<div class="container" style=" padding:25px;">
		<div class = "page-header" >   
			<h2>Agregar punto del recorrido</h2>
		</div> 
		<form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" action="/admin/mapedit/<?php echo $pointId ?>" novalidate>
			<fieldset>
				<div class="row">
					<div class="col-sm-5">
						<div style = "margin-top:10px;">
						<label><font color="red"></font>Nombre</label>
						<input class = "form-control" type="text" id="pointName" name="pointName" value="<?php echo $point->name ?>">
						<span class="error" aria-live="polite"></span>
						</div>
					</div>
					<div class="col-sm-5">
						<div style = "margin-top:10px;">
						<label><font color="red"></font>Latitud</label>
						<input class = "form-control" type="number" id="latitude" name="latitude" step="0.01" value="<?php echo $point->latitude ?>" style="background-color:white;" readonly>
						<span class="error" aria-live="polite"></span>
						</div>
					</div>
				</div>
				<div class="row">
				 <div class="col-sm-5">
						<label><font color="red"></font>Longitud</label>
						<input class = "form-control" type="number" id="longitude" name="longitude" step="0.01" value="<?php echo $point->longitude ?>" style="background-color:white;" readonly>
						<span class="error" aria-live="polite"></span>
				</div>
			</div>

			</fieldset>

			<!--
			
							Textos asociados
			
			-->
			
			<div class = "page-header" >   
	            <h2>Textos asociados</h2>
			</div> 
			
			<!-- Texto por agregar -->
			<div style="margin-top:30px; margin-bottom:30px; overflow:auto;">
				<?php if($textContents->count() == 0): ?>
					<div class="row">
						<div class="col-sm-10">
							<label><font color="red"></font>Descripción </label>
							<input class = "info_data" type="text" id="descripcion_point" name="descripcion_point" >
						</div>
					</div>
				<?php endif; ?>
				
				<!-- Textos del punto -->
				
				<?php foreach ($textContents as $contentText): ?>
					<div class="row">
						<div class="col-sm-10">
							<label><font color="red"></font>Descripción </label>
							<?php if(!empty($contextText->link_path)):?>
								<input class = "info_data" type="text" id="descripcion_point" name="descripcion_point" value="<?php echo $contentText->link_path?>" >
							<?php else: ?>
								<input class = "info_data" type="text" id="descripcion_point" name="descripcion_point" value="<?php echo $contentText->description?>" >
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			
			<!--
			
							Imágenes asociadas
			
			-->
			<div style="margin-bottom:30px; overflow:auto;">
				<div class = "page-header" >   
					<h2>Agregar imagenes</h2>
				</div>
					
				<!-- Imagen por agregar -->
				<div id ="content_image_0" style="margin-top:10px; margin-bottom:10px;">
					<div class="row" id ="row_imagen_0">
						<div class="col-sm-5">
							<label><font color="red"></font>Nombre </label>
							<input class = "info_name_image" type="text" id="container_image_new_name0" placeholder="Ingrese el nombre de la imagen"/>
						</div>
						<div class="col-sm-5">
							<div><label><font color="red"></font>Imagen </label></div>
							<input class = "info_data_image" id="container_image_name0" placeholder="Seleccione un archivo" style="background-color=white;" readonly />
							<input class = "info_data_image" id="container_image_temp0" placeholder="Seleccione un archivo" disabled="disabled" style = "display:none;"/>
							<div class="col-sm-2">
								<div class="fileUpload btn btn-primary" id = "element_row_0" style ="margin-top: 15px;">
									<span>Subir</span>
									<input type="file"  class = "upload_image" multiple="multiple" id="container_path_new_image0" value="image_temp" accept="image/*"  onchange="loadFile(event, 0)">
								</div>
							</div>
						</div>
						<div class="col-sm-2" id="element_eliminar_button0">
							<button class="btn btn-success" style ="margin-top: 25px;" type="button" id="0" onclick="agregarImagenNueva(this.id)"><span class="glyphicon glyphicon-plus" ></span> Agregar</button>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-5" style="margin-bottom:20px;" id = "element_row_buttons_0"> </div>
					</div>
				</div>

				<!-- Imágenes del punto -->
				
				<div id="contentImage">
					<?php foreach ($imageContents as $contentImage): ?>
						<script>
							agregarImagen("<?php echo $contentImage->id ?>", "<?php echo $contentImage->description ?>", "<?php echo $contentImage->link_path ?>");
						</script>
					<?php endforeach; ?>
				</div>
			</div>
			
			<!--
			
							Videos asociados
			
			-->
			<div style="margin-bottom:30px; overflow:auto;">
				<div class = "page-header" style="margin-top:30px;">   
					<h2>Agregar videos</h2>
				</div> 

				<button class="btn btn-success" style ="margin-bottom: 15px;" type="button" onclick = "agregarVideo();">
					<span class="glyphicon glyphicon-plus"></span> Agregar
				</button>
				
				<!-- Video por agregar -->
				
				<div class="row">
					<div class="col-sm-5">
						<label><font color="red"></font>Nombre </label>
						<input class = "info_data" type="text" name="video_name" placeholder="Ingrese el nombre del video" id ="1">
					</div>
					<div class="col-sm-5">
						<label><font color="red"></font> Video </label>
						<input class = "info_data" type="text" name="video_path" placeholder="Ingrese la ruta del video" id = "1">
					</div>
				</div>
				
				<div id ="new_content"> </div>
				
				<!-- Videos del punto -->
			
				<?php foreach ($videoContents as $contentVideo): ?>
					<div class="row">
						<div class="col-sm-5">
						<label><font color="red"></font>Nombre </label>
							<input class = "info_data" type="text" id="name" name="container_name[<?php echo $contentVideo->id?>]" value="<?php echo $contentVideo->description ?>" readonly>
						</div>
						 <div class="col-sm-5">
							<div><label><font color="red"></font>Imagen </label></div>
							<input class = "info_data" type="text" id="link_path" name="container_path[<?php echo $contentVideo->id?>]" value="<?php echo $contentVideo->link_path ?>" readonly>
						</div>
						<div>
							<div><label><font color="red"></font></label></div>
						</div>
						<div class="col-sm-2">
							<button class="btn btn-danger" style ="margin-top: 4px;"><span class="glyphicon glyphicon-remove" name="container_button[<?php echo $contentVideo->id?>]"></span> Eliminar</button>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			
			<!-- Modificar el punto -->
			
			<div class="row" style = "margin-top: 35px;"">
				<div class="col-sm-6">
					<button class="btn btn-primary"  type="submit" class="btn btn-default">Modificar punto</button>       
				</div>
			</div>
		</form>
	</div>
</div>

<style type="text/css">

.info_image{
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    width: 87%;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.info_data{
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    width: 100%;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.info_video{
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    width: 100%;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
}

.fileUpload {
    position: relative;
    overflow: hidden;
    margin-left: 0px;
    margin-top: 10px;

}
.fileUpload input.upload_image {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

.info_name_image{
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    width: 100%;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.info_data_image{
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    width: 100%;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
}

</style>
