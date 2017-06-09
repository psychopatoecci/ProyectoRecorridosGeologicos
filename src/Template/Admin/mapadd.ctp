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

	var actual_img = 0;
	var siguiente_img = 1;
	var elementos_img = new Array();

	var actual_video = 0;
	var siguiente_video = 1;
	var elementos_video = new Array();

	function agregarImagen(){

		elementos_img.push(actual_img);
		console.log(elementos_img);

		document.getElementById("tmp_image_"+actual_img).style.display = "none";
		document.getElementById("element_row_"+actual_img).style.display = "none";
		
		document.getElementById("container_path_image_" + actual_img).setAttribute("name", "container_image["+actual_img +"][0]");
		document.getElementById("container_name_image_" + actual_img).setAttribute("name", "container_image["+actual_img +"][1]");

		var buttons = 	"<button class = \"btn btn-info\" onclick = \" verImagen('" + document.getElementById("tmp_image_"+actual_img).value +"');\" type=\"button\" style=\"margin-top:10px; margin-right:10px;\"> Ver </button>" +
						"<button class = \"btn btn-danger\" onclick = \" eliminarImagen('" + actual_img +"');\" type=\"button\" style=\"margin-top:10px; \"> Eliminar  </button>" ;
						
		$("#element_row_buttons_" + actual_img).append(buttons);

		siguiente_img = elementos_img.length ;

		for (var i = 0; i < elementos_img.length; i++) {

			var same = false;
			
			for(var j = 0; j < elementos_img.length; j++) {
				same= ((i== elementos_img[j]) ? true:false);
			}

			if (same==false)
			{
				siguiente_img = i;
				break;
			}

		}

		actual_img = siguiente_img;
		
		var element = 	"<div class=\"row\" id =\"row_imagen_"+ siguiente_img + "\">" +
							"<div class=\"col-sm-6\">" +
								"<label><font color=\"red\"></font>Nombre </label>" +
								"<input class = \"info_name_image\" type=\"text\" id=\"container_name_image_"+ siguiente_img +"\" />" +
							"</div>" +
							"<div class=\"col-sm-6\">" +
							"<div><label><font color=\"red\"></font>Imagen </label></div>" +
								"<input class = \"info_data_image\" id=\"name_image_" +siguiente_img +"\" placeholder=\"Seleccione un archivo\"/>" +
								"<input class = \"info_data_image\" id=\"tmp_image_" + siguiente_img + "\" placeholder=\"Seleccione un archivo\" disabled=\"disabled\" style = \"display:none;\" />" +
								"<div class=\"fileUpload btn btn-primary\" id = \"element_row_"+siguiente_img+"\"\>" +
									"<span>Subir</span>" +
									"<input type=\"file\" name =\"\" multiple=\"multiple\" id=\"container_path_image_"+ siguiente_img +"\" class=\"upload_image_list\" value=\"image_temp\" accept=\"image/*\" onchange=\"loadFile(event,"+ siguiente_img +")\">" +
								"</div>"+
							"</div>" +
							"<div class=\"col-sm-6\" id = \"element_row_buttons_" + siguiente_img +"\">" +
							"</div>"+
						"</div>";


		$("#new_content_image").prepend(element);
	}

	function verImagen(url_image)
	{
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

	function eliminarImagen(name_row){
		$("#"+"row_imagen_" + name_row ).remove();
		var index = elementos_img.indexOf(parseInt(name_row));
		if (index > -1) {
		    elementos_img.splice(index, 1);
		}
	}

	function agregarVideo(){
	
		var video_name = document.getElementsByName("video_name")[actual_video].value;
		var video_path = document.getElementsByName("video_path")[actual_video].value;

		siguiente_video = elementos_video.length ;

		for (var i = 0; i < elementos_video.length; i++) {

			var same = false;
			for(var j = 0; j < elementos_video.length; j++){
				same= ((i== elementos_video[j]) ? true:false);
			}

			if (same==false)
			{
				siguiente_video = i;
				break;
			}

		}

		var element = "<div class=\"row\" id =\""+ "row_video_" + siguiente_video  +"\">" + 
		  				"<div class=\"col-sm-6\">" +
						"<label><font color=\"red\" style=\"margin-top:10px;\"></font>Nombre </label>" +
							"<input class = \"info_video\" type=\"text\" id = \"CV\" name=\"container_video["+ siguiente_video +"][0]\" value = "+ video_name +" readonly>" +
						"</div>"+
						"<div class=\"col-sm-6\">" +
							"<label><font color=\"red\" style=\"margin-top:10px;\"></font> Video </label>" +
							"<input class = \"info_data\" type=\"text\" id = \"CV\" name=\"container_video["+ siguiente_video +"][1]\" value =" + video_path +" readonly>" +
						"</div>" +
						"<div class=\"col-sm-6\">" +
							"<button class = \"btn btn-info\" onclick = \" verVideo('" + video_path +"');\" type=\"button\" style=\"margin-top:10px; margin-right:10px;\"> Ver </button>" +
							"<button class = \"btn btn-danger\" onclick = \" eliminarVideo('" + siguiente_video +"');\" type=\"button\" style=\"margin-top:10px; \"> Eliminar  </button>" +
						"</div>" +
				      "</div>";

		$("#new_content").prepend(element);

		document.getElementsByName("video_name")[actual_video].value = "";
		document.getElementsByName("video_path")[actual_video].value = "";
		elementos_video.push(siguiente_video);
	}


	function verVideo(url_video)
	{
		var data_point = new Array();
		data_point.push({src:url_video,type:'iframe'}); 

		$.magnificPopup.open({
			items: data_point,
			gallery: {
				enabled: true
			},
			type: 'image' 
		});
	}

	function eliminarVideo(name_row){
		$("#"+"row_video_" + name_row ).remove();
		var index = elementos_video.indexOf(parseInt(name_row));
		if (index > -1) {
		    elementos_video.splice(index, 1);
		}
	}
	
	var loadFile = function(event,id) {
		var output = document.getElementById('container_path_image_' + id);
		document.getElementById('tmp_image_' + id).value = URL.createObjectURL(event.target.files[0]);
		document.getElementById('name_image_'+ id).value =  output.files[0].name;

 	};

</script>



<div class="help-tip">
	<p>Esta página le permite administrar el contenido de los mapas de los recorridos: puede agregar un nuevo punto con su respectivo contenido (imagenes y videos).</p>
</div>

<div class="container-fluid">
	<div class="container" style=" padding:25px;">
		<div class = "page-header" >   
			<h2>Agregar punto del recorrido</h2>
		</div> 
		<form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" action="/admin/mapadd/<?php echo $tourId ?>" novalidate>
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div style = "margin-top:10px ;">
						<label><font color="red"></font>Nombre</label>
						<input class = "form-control" type="text" id="name" name="name" >
						<span class="error" aria-live="polite"></span>
					</div>
					</div>
					<div class="col-sm-6">
						<div style = "margin-top:10px ;">
							<label><font color="red"></font>Latitud</label>
							<input class = "form-control" type="number" id="latitude" name="latitude" step="0.0001">
							<span class="error" aria-live="polite"></span>
						</div>
					</div>
				</div>
				<div class="row">
					 <div class="col-sm-6">
							<label><font color="red"></font>Longitud</label>
							<input class = "form-control" type="number" id="longitude" name="longitude" step="0.01">
							<span class="error" aria-live="polite"></span>
					</div>
				</div>
			</fieldset>

			<div class = "page-header" >   
				<h2>Agregar texto</h2>
			</div> 

			<div class="row">
				<label><font color="red"></font>Descripción </label>
				<input class = "info_data" type="text" id="descripcion_point" name="descripcion_point" >
			</div>

			<div class = "page-header" >   
				<h2>Agregar imagenes</h2>
			</div>

			<button class="btn btn-success" style ="margin-bottom: 15px;" type="button" onclick = "agregarImagen();"  id = "button_add_image">
				<span class="glyphicon glyphicon-plus" ></span> Agregar
			</button>
				
			<div id ="new_content_image">
				<div class="row" id ="row_imagen_0">
					<div class="col-sm-6">
						<label><font color="red"></font>Nombre </label>
						<input class = "info_name_image" type="text" id="container_name_image_0" />
					</div>
				<div class="col-sm-6">
					<div><label><font color="red"></font>Imagen </label></div>
					<input class = "info_data_image" id="name_image_0" placeholder="Seleccione un archivo"  />
					<input class = "info_data_image" id="tmp_image_0" placeholder="Seleccione un archivo" disabled="disabled" style = "display:none;"/>
					<div class="fileUpload btn btn-primary" id = "element_row_0">
						<span>Subir</span>
						<input type="file"  class = "upload_image" multiple="multiple" id="container_path_image_0" value="image_temp" accept="image/*" onchange="loadFile(event,0)">
					</div>
				</div>
				<div class="col-sm-6" id = "element_row_buttons_0"> 
				</div>
				</div>
			</div>

			<div class = "page-header" >   
				<h2>Agregar videos</h2>
			</div> 

			<button class="btn btn-success" style ="margin-bottom: 15px;" type="button" onclick = "agregarVideo();">
				<span class="glyphicon glyphicon-plus"></span> Agregar
			</button>
			
			<div class="row">
				<div class="col-sm-6">
					<label><font color="red"></font>Nombre </label>
					<input class = "info_data" type="text" name="video_name" placeholder="Ingrese el nombre del video" id ="1">
				</div>
				<div class="col-sm-6">
					<label><font color="red"></font> Video </label>
					<input class = "info_data" type="text" name="video_path" placeholder="Ingrese la ruta del video" id = "1">
				</div>
			</div>

			<div id ="new_content"> </div>
			
			<div class="row" style = "margin-top: 35px;"">
				<div class="col-sm-6">
					<button class="btn btn-primary"  type="submit" class="btn btn-default">Crear punto</button>       
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
