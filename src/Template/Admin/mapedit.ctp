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
	
	var actual_vid = 0; 
	var siguiente_vid = 1;
	var elementos_vid_old = new Array();
	var elementos_vid_new = new Array();
	
	function agregarImagenNueva(id_data){

		var id = id_data.substr(1);
		var name_image = document.getElementById("container_image_new_name" + actual_img).value;	
	    var content_image = document.getElementById("container_path_new_image" + actual_img).value;	

	    if(content_image == ""  || name_image == "") {
		   
		   	if (name_image == "") {
		    	$("#validate_name_image_"+ actual_img + " p" ).remove();
		    	$("#validate_name_image_" + actual_img).append("<p style = \"color:red; font-weight: bold;\">*El nombre de la imagen no puede ser un campo vacio</p> ")
	    		setTimeout(function() { $("#validate_name_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_image_" + actual_img +" p").remove(); }, 100000);
		    }
		    else
		    {
		       $("#validate_name_image_"+ actual_img + " p" ).remove();
		    	$("#validate_name_image_" + actual_img).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
	    		setTimeout(function() { $("#validate_name_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_image_" + actual_img +" p").remove(); }, 100000);
		    }

		    if (content_image == "" ) {
		    	$("#validate_content_image_"+ actual_img + " p" ).remove();
		    	$("#validate_content_image_" + actual_img).append("<p style = \"color:red; font-weight: bold;\">*El campo de la imagen no puede ser un vacio</p> ")
	    		setTimeout(function() { $("#validate_content_image_" + actual_img +" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_content_image_" + actual_img +" p").remove(); }, 100000);
		    }
		    else
		    {
		    	$("#validate_content_image_"+ actual_img + " p" ).remove();
		    	$("#validate_content_image_" + actual_img).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
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
			var buttonEliminar = "<button class = \"btn btn-info\" onclick = \" eliminarImagenNueva('" + id + "');\" type=\"button\" style=\"font-size:12px; margin-top: 25px; \"> Eliminar  </button>" ;

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
						"<input class = \"info_name_image\" type=\"text\" name=\"container_image["+ id +"][0]\" id=\"container_image["+ id +"][0]\" value=\"" + nombre + "\"/ readonly>" +
					"</div>" +
					"<div class=\"col-sm-5\">" +
						"<div><label><font color=\"red\"></font>Imagen </label></div>" +
						"<input class = \"info_data_image\" name=\"container_image[" + id +"][1]\" id=\"container_image[" + id +"][1]\" value=\"" + imagen + "\" readonly/>" +
					"</div>" +
					"<div class=\"col-sm-2\">" +
						"<button class = \"btn btn-info\" onclick = \" verImagen('" + imagen + "');\" type=\"button\"  style=\"margin-top:25px; margin-right:3px; font-size: 12px;\" > Ver </button>" +
						"<button class=\"btn btn-info\" type=\"button\" style=\"margin-top:25px; font-size: 12px;\" name=\"initial\" id=\"" + id + "\" onclick=\"eliminarImagen(this.id)\" > Eliminar</button>" +
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

	function agregarVideo(id, nombre, video){
		var element = 
			"<div id=\"initial_video" + id + "\">" + 
				"<div class=\"row\">" +
					"<div class=\"col-sm-5\">" + 
						"<label><font color=\"red\"></font>Nombre </label>" +
						"<input class = \"info_data\" type=\"text\" id=\"container_video[" + id + "][0]\" name=\"container_video[" + id + "][0]\" value=\"" + nombre + "\" readonly>" + 
					"</div>" + 
					"<div class=\"col-sm-5\">" +
						"<div><label><font color=\"red\"></font>Video </label></div>" + 
						"<input class = \"info_data\" type=\"text\" id=\"container_video[" + id + "][1]\" name=\"container_video[" + id + "][1]\" value=\"" + video +"\" readonly>" + 
					"</div>" + 
					"<div class=\"col-sm-2\">" +
						"<button class = \"btn btn-info\" onclick = \" verVideo('" + video + "');\" type=\"button\" style=\"font-size:12px; margin-top:25px; margin-right:3px;\"> Ver </button>" + 
						"<button class=\"btn btn-info\" type=\"button\" style =\"margin-top: 25px; font-size:12px;\" id=\"" + id + "\"name=\"eliminar_button_video" + id + "\" onclick=\"eliminarVideo(this.id)\"> Eliminar</button>" +
					"</div>" +
				"</div>" +
			"</div>";
		
		$("#contentVideo").prepend(element);
		$("#leyenda_videos_p_" + actual_vid ).remove();
		elementos_vid_old.push(parseInt(id));
	}
	
	function eliminarVideo(id){
		console.log(document.getElementById("initial_video" + id));
		nombre = document.getElementById("container_video[" + id + "][0]").value;
		imagen = document.getElementById("container_video[" + id + "][1]").value;
		document.getElementById("initial_video" + id).innerHTML = 
		"<div id=\"initial_video" + id + "\"  style=\"display:none;\" >" +
			"<div class=\"col-sm-5\">" +
				"<label><font color=\"red\"></font>Nombre </label>" +
				"<input class = \"info_name_image\" type=\"text\" name=\"container_video_delete["+ id +"][0]\" id=\"container_video_delete["+ id +"][0]\" value=\"" + nombre + "\"/>" +
			"</div>" +
			"<div class=\"col-sm-5\">" +
				"<div><label><font color=\"red\"></font>Imagen </label></div>" +
				"<input class = \"info_data_image\" name=\"container_video_delete[" + id +"][1]\" id=\"container_video_delete[" + id +"][1]\" value=\"" + imagen + "\"/>" +
			"</div>" +
		"</div>";

		var index = elementos_vid_old.indexOf(parseInt(id));
		if (index > -1) {
		    elementos_vid_old.splice(index, 1);
		}

		console.log(elementos_vid_old);
		console.log(elementos_vid_new);

		if (elementos_vid_new.length == 0 && elementos_vid_old.length == 0)
		{
			 $("#leyenda_videos_" + actual_vid).append("<p id =\"leyenda_videos_p_" + actual_vid +"\" align=\"middle\"> No existen ninguna videos agregado</p>");
		}

	}

	function agregarVideoNuevo(id_data){

		var id = id_data.substr(1);
		var video_name = document.getElementById("video_name_"+actual_vid).value;
		var video_path = document.getElementById("video_path_"+actual_vid).value;


	    if(video_name == "" || video_path == "" ) {
		   
		   	if (video_name == "") {
		    	$("#validate_name_video_"+actual_vid+" p" ).remove();
		    	$("#validate_name_video_"+actual_vid).append("<p style = \"color:red; font-weight: bold;\">*El nombre del video no puede ser un campo vacio</p> ")
	    		setTimeout(function() { $("#validate_name_video_"+actual_vid+" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_video_"+actual_vid+" p").remove(); }, 100000);
		    }
		    else
		    {
		    	$("#validate_name_video_"+actual_vid+" p" ).remove();
		    	$("#validate_name_video_"+actual_vid).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
	    		setTimeout(function() { $("#validate_name_video_"+actual_vid+" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_video_"+actual_vid+" p").remove(); }, 100000);
		    }

		    if (video_path == "") {
		    	$("#validate_content_video_"+actual_vid+" p" ).remove();
		    	$("#validate_content_video_"+actual_vid).append("<p style = \"color:red; font-weight: bold;\">*El campo de la url no puede ser un vacio</p> ")
	    		setTimeout(function() { $("#validate_content_video_"+actual_vid+" p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_content_video_"+actual_vid+" p").remove(); }, 100000);
		    }
		    else
		    {
			    var patron = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;

		    	if (video_path.match(patron))
		    	{
			    	$("#validate_content_video_"+actual_vid+" p" ).remove();
			    	$("#validate_content_video_"+actual_vid).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
		    		setTimeout(function() { $("#validate_content_video_"+actual_vid+" p").fadeOut(); }, 1500); 
		    		setTimeout(function(){$("#validate_content_video_"+actual_vid+" p").remove(); }, 100000);
		    	}
		    	else
		    	{
			  		$("#validate_content_video_"+actual_vid+" p" ).remove();
			    	$("#validate_content_video_"+actual_vid).append("<p style = \"color:red; font-weight: bold;\">*El campo de la url es inválido</p> ")
		    		setTimeout(function() { $("#validate_content_video_"+actual_vid+" p").fadeOut(); }, 1500); 
		    		setTimeout(function(){$("#validate_content_video_"+actual_vid+" p").remove(); }, 100000);  		
		    	}
		    }

		}
		else 
		{
			var patron = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;

	    	if (video_path.match(patron))
	    	{
				elementos_vid_new.push(parseInt(id));
				document.getElementById("video_name_" + id).setAttribute("name", "container_video_new["+ id +"][0]");
				document.getElementById("video_path_" + id).setAttribute("name", "container_video_new["+ id +"][1]");
				document.getElementById("video_name_" + id).setAttribute("id", "container_video_new["+ id +"][0]");
				document.getElementById("video_path_" + id).setAttribute("id", "container_video_new["+ id +"][1]");
				
				document.getElementsByName("videoAgregarButtom" + id)[0].style.display = "none";
				
				var buttonVer = "<button class = \"btn btn-info\" onclick = \" verVideo('" + document.getElementById("container_video_new[" + id + "][1]").value + "');\" type=\"button\" style = \" margin-top: 25px; font-size:12px; margin-right:3px;\"> Ver </button>";
				var buttonEliminar = "<button class = \"btn btn-info\" onclick = \" eliminarVideoNuevo('" + id + "');\" type=\"button\" style=\" margin-top: 25px; font-size:12px;\"> Eliminar  </button>" ;
				
				$("#element_eliminar_button_video" + id).append(buttonVer);
				$("#element_eliminar_button_video" + id).append(buttonEliminar);
				
				document.getElementById("v"+id).style.display = "none";
				
				siguiente_vid = elementos_vid_new.length;
				
				$("#leyenda_videos_" + id).remove();
				actual_vid = siguiente_vid;

				var nuevoElemento = 
					"<div id=\"video_por_agregar_" + siguiente_vid + "\">" + 
						"<div class=\"row\">" +
							"<div class=\"col-sm-5\">" +
								"<label><font color=\"red\"></font>Nombre </label>" + 
								"<input class = \"info_data\" type=\"text\" name=\"video_name_" + siguiente_vid + "\" id=\"video_name_" + siguiente_vid + "\"  placeholder=\"Ingrese el nombre del video\" >" + 
								"<span class=\"error\" aria-live=\"polite\" id =\"validate_name_video_"+siguiente_vid+"\"></span>"+
							"</div>" + 
							"<div class=\"col-sm-5\">" + 
								"<label><font color=\"red\"></font> Video </label>" + 
								"<input class = \"info_data\" type=\"text\" name=\"video_path_" + siguiente_vid + "\" id=\"video_path_" + siguiente_vid + "\" placeholder=\"Ingrese la ruta del video\">" + 
								"<span class=\"error\" aria-live=\"polite\" id =\"validate_content_video_"+siguiente_vid+"\"></span>"+
							"</div>" +
							"<div class=\"col-sm-2\" id=\"element_eliminar_button_video" + siguiente_vid + "\">" +
								"<button class=\"btn btn-success\" style =\"margin-top: 25px; font-size:12px; background-color: #3299bb; border-color: #3299bb;\" type=\"button\" id=\"v" + siguiente_vid + "\" name=\"videoAgregarButtom" + siguiente_vid + "\" onclick=\"agregarVideoNuevo(this.id)\"><span class=\"glyphicon glyphicon-plus\" ></span> Agregar</button>" + 
							"</div>" + 
					"</div>"+
					"<div id=\"leyenda_videos_"+siguiente_vid+"\">" +
							"<div class = \"page-header\" >" +
								"<h4>Videos agregados</h4>" +
							"</div>" +
					"</div>";
			
				$("#video_por_agregar_" + id).before(nuevoElemento);
		}
    	else
    	{
    		$("#validate_name_video_"+actual_vid+" p" ).remove();
	    	$("#validate_name_video_"+actual_vid).append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
    		setTimeout(function() { $("#validate_name_video_"+actual_vid+" p").fadeOut(); }, 1500); 
    		setTimeout(function(){$("#validate_name_video_"+actual_vid+" p").remove(); }, 100000);

	  		$("#validate_content_video_"+actual_vid+" p" ).remove();
	    	$("#validate_content_video_"+actual_vid).append("<p style = \"color:red; font-weight: bold;\">*El campo de la url es inválido</p> ")
    		setTimeout(function() { $("#validate_content_video_"+actual_vid+" p").fadeOut(); }, 1500); 
    		setTimeout(function(){$("#validate_content_video_"+actual_vid+" p").remove(); }, 100000);  		
    	}
      }
	}

	function eliminarVideoNuevo(id){
		document.getElementById("video_por_agregar_" + id).style.display = "none";
		document.getElementById("container_video_new[" + id + "][0]").setAttribute("name", "removed");
		document.getElementById("container_video_new[" + id + "][1]").setAttribute("name", "removed");

		var index = elementos_vid_new.indexOf(parseInt(id));
		if (index > -1) {
		    elementos_vid_new.splice(index, 1);
		}

		console.log(elementos_vid_old);
		console.log(elementos_vid_new);

		if (elementos_vid_new.length == 0 && elementos_vid_old.length == 0)
		{
			 $("#leyenda_videos_" + actual_vid).append("<p id =\"leyenda_videos_p_" + actual_vid +"\" align=\"middle\"> No existen ningun video agregado</p>");
		}

	}
	
	function verVideo(url_video){
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
</script>

<div class="help-tip">
	<p>Esta página le permite administrar el contenido de los mapas de los recorridos: puede modificar un punto y su respectivo contenido (texto, imágenes y videos).</p>
</div>

<div class="container-fluid">
	<div class="container" style=" padding:25px;">
		<div class = "page-header" >   
			<h2>Modificar punto del recorrido</h2>
		</div> 
		<form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" action="/admin/mapedit/<?php echo $pointId ?>" onsubmit="return validateForm()" novalidate>
			<fieldset>
				<div class="row">
					<div class="col-sm-6">
						<div style = "margin-top:10px;">
						<label><font color="red"></font>Nombre</label>
						<input class = "form-control" type="text" id="pointName" name="pointName" value="<?php echo $point->name ?>" placeholder="Ingrese el nombre del punto">
						<span class="error" aria-live="polite" id ="name_point_validate"></span>
						</div>
					</div>
					<div class="col-sm-6">
						<div style = "margin-top:10px;">
						<label><font color="red"></font>Latitud</label>
						<input class = "form-control" type="number" id="latitude" name="latitude"  min="7.967310" max="11.302868" step="0.0000001" value="<?php echo $point->latitude ?>" style="background-color:white;" placeholder="Ingrese la latitud el punto">
							<span class="error" aria-live="polite" id ="latitude_validate"></span>
						</div>
					</div>
				</div>
				<div class="row">
				 <div class="col-sm-6">
						<label><font color="red"></font>Longitud</label>
						<input class = "form-control" type="number" id="longitude" name="longitude" min="-86.210410" max="-82.381674" step="0.0000001" value="<?php echo $point->longitude ?>" style="background-color:white;" placeholder="Ingrese la longitud del punto">
						<span class="error" aria-live="polite" id = "longitude_validate"></span>
				</div>
			</div>

			</fieldset>
			
			<div class = "page-header" >   
				<h3>Contenido</h3>
			</div> 

			<div class="tab">
				<button class="tablinks" type = "button" onclick="openElement(event, 'texto_descriptivo')" id="defaultOpen">Agregar texto descriptivo</button>
				<button class="tablinks" type = "button" onclick="openElement(event, 'contenido_imagenes')">Agregar imágenes</button>
				<button class="tablinks" type = "button" onclick="openElement(event, 'contenido_videos')">Agregar videos</button>
			</div>
			
			<div id="texto_descriptivo" class="tabcontent" style="overflow-y: scroll; height:350px;">
			<!-- Texto por agregar -->
			<div style="margin-top:30px; margin-bottom:30px; ">
				<?php if($textContents->count() == 0): ?>
					<div class="row">
							<label><font color="red"></font>Descripción </label>
							<textarea class = "info_data" type="text" id="descripcion_point" name="descripcion_point" rows="10"> </textarea>
					</div>
				<?php endif; ?>
				
				<!-- Textos del punto -->
				
				<?php foreach ($textContents as $contentText): ?>
					<div class="row">
							<label><font color="red"></font>Descripción </label>
							<textarea  class = "info_data" type="text" id="descripcion_point" name="descripcion_point" value="<?php echo $contentText->description?>" rows="10"><?php echo $contentText->description?></textarea>
					</div>
				<?php endforeach; ?>
			</div>
			
			</div>


			<!--
			
							Imágenes asociadas
			
			-->
			<div id="contenido_imagenes" class="tabcontent" style="overflow-y: scroll; height:350px;">
					
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
			<div id="contenido_videos" class="tabcontent" style="overflow-y: scroll; height:350px;">
				<!-- Video por agregar -->
				<div id="video_por_agregar_0">
					<div class="row">
						<div class="col-sm-5">
							<label><font color="red"></font>Nombre </label>
							<input class = "info_data" type="text" name="video_name_0" id="video_name_0" placeholder="Ingrese el nombre del video">
							<span class="error" aria-live="polite" id ="validate_name_video_0"></span>
						</div>
						<div class="col-sm-5">
							<label><font color="red"></font> Video </label>
							<input class = "info_data" type="text" name="video_path_0" id="video_path_0" placeholder="Ingrese la ruta del video">
							<span class="error" aria-live="polite" id ="validate_content_video_0"></span>
						</div>
						<div class="col-sm-2" id="element_eliminar_button_video0">
							<button class="btn btn-success" style ="margin-top: 25px; font-size: 12px; background-color: #3299bb; border-color: #3299bb;" type="button" id="v0" name="videoAgregarButtom0" onclick="agregarVideoNuevo(this.id)"><span class="glyphicon glyphicon-plus" ></span> Agregar</button>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2" style="margin-bottom:20px;" id = "element_row_buttons_video0"> </div>
					</div>
				</div>
				<div id="leyenda_videos_0">
					<div class = "page-header" >
						<h4>Videos agregados</h4>
					</div>
					<p id ="leyenda_videos_p_0" align="middle"> No existen ninguna imagen agregada</p>
				</div>
				<div id ="new_content"> </div>
				
				<!-- Videos del punto -->
			
				<div id="contentVideo">
					<?php foreach ($videoContents as $contentVideo): ?>
						<script>
							agregarVideo("<?php echo $contentVideo->id?>", "<?php echo $contentVideo->description ?>", "<?php echo $contentVideo->link_path ?>");
						</script>
					<?php endforeach; ?>
				</div>
			</div>
			
			<!-- Modificar el punto -->
			
			<div class="row" style = "margin-top: 35px;"">
				<div class="col-sm-6">
					<button class="btn btn-primary"  type="submit" >Guardar</button>       
					<button class="btn btn-danger"  type="button" onclick="window.location.href='/admin/mapindex/1'">Cancelar</button>       
				</div>
			</div>
		</form>
	</div>
</div>


<script type="text/javascript">
	function openElement(evt, elementName) {
    var r, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (r= 0; r < tabcontent.length; r++) {
        tabcontent[r].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (r = 0; r < tablinks.length; r++) {
        tablinks[r].className = tablinks[r].className.replace(" active", "");
    }
    document.getElementById(elementName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

	function validateForm() {

		var status = true;
	    var name = document.getElementById("pointName").value;	    

	    if (name == "") {
	    	$('#name_point_validate p').remove();
	    	$("#name_point_validate").append("<p style = \"color:red; font-weight: bold;\">*El nombre del punto no puede ser un campo vacio</p> ")
    		setTimeout(function() { $('#name_point_validate p').fadeOut(); }, 8000); 
    		setTimeout(function(){$('#name_point_validate p').remove(); }, 100000);
    		status = false;
	    }
	    else
	    {
	    	$('#name_point_validate p').remove();
	    	$("#name_point_validate").append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
    		setTimeout(function() { $('#name_point_validate p').fadeOut(); }, 8000); 
    		setTimeout(function(){$('#name_point_validate p').remove(); }, 100000);
	    }

	    var latitude = document.getElementById("latitude").value;	    

	    if (latitude == "") {
	    	$('#latitude_validate p').remove();
	    	$("#latitude_validate").append("<p style = \"color:red; font-weight: bold;\">*La latitud del punto no puede ser un campo vacio</p> ")
    		setTimeout(function() { $('#latitude_validate p').fadeOut(); }, 8000); 
    		setTimeout(function(){$('#latitude_validate p').remove(); }, 100000);
    		status = false;
	    }
	    else
	    {
			if ( parseFloat(latitude)>=7.967310 && parseFloat(latitude) <= 11.302868 ){
		    	$('#latitude_validate p').remove();
		    	$("#latitude_validate").append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
	    		setTimeout(function() { $('#latitude_validate p').fadeOut(); }, 8000); 
	    		setTimeout(function(){$('#latitude_validate p').remove(); }, 100000);
	    	}
	    	else
	    	{
		    	$('#latitude_validate p').remove();
		    	$("#latitude_validate").append("<p style = \"color:red; font-weight: bold;\">*La latitud del punto no se encuentra dentro de un rango válido</p> ")
				setTimeout(function() { $('#latitude_validate p').fadeOut(); }, 8000); 
				setTimeout(function(){$('#latitude_validate p').remove(); }, 100000);
				status = false;		
	    	}
	    }

	   	var longitude = document.getElementById("longitude").value;	    

	    if (longitude == "") {
	    	$('#longitude_validate p').remove();
	    	$("#longitude_validate").append("<p style = \"color:red; font-weight: bold;\">*La longitud del punto no puede ser un campo vacio</p> ")
    		setTimeout(function() { $('#longitude_validate p').fadeOut(); }, 8000); 
    		setTimeout(function(){$('#longitude_validate p').remove(); }, 100000);
    		status = false;
	    }
	    else
	    {
	    	if ( parseFloat(longitude)>= -86.210410 && parseFloat(longitude) <= -82.381674 ){
		    	$('#longitude_validate p').remove();
		    	$("#longitude_validate").append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
	    		setTimeout(function() { $('#longitude_validate p').fadeOut(); }, 8000); 
	    		setTimeout(function(){$('#longitude_validate p').remove(); }, 100000);
	    	}
	    	else
	    	{
		    	$('#longitude_validate p').remove();
		    	$("#longitude_validate").append("<p style = \"color:red; font-weight: bold;\">*La longitud del punto no se encuentra dentro de un rango válido</p> ")
				setTimeout(function() { $('#longitude_validate p').fadeOut(); }, 8000); 
				setTimeout(function(){$('#longitude_validate p').remove(); }, 100000);
				status = false;	
	    	}
	    }

	    return status;
	}
</script>