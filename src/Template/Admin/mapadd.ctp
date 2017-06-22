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
	var elementos_img = new Array();

	var actual_video = 0;
	var siguiente_video = 1;
	var elementos_video = new Array();

	function agregarImagen(){

	    var name_image = document.getElementById("container_name_image_" + actual_img).value;	
	    var content_image = document.getElementById("name_image_" + actual_img).value;
	    var content_image_input = document.getElementById("container_path_image_" + actual_img).value;		

	    if(content_image == "" || content_image_input == "" || name_image == "") {
		   
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

		    if (content_image == "" || content_image_input == "") {
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
			elementos_img.push(actual_img);
			console.log(elementos_img);

			document.getElementById("tmp_image_"+actual_img).style.display = "none";
			document.getElementById("element_row_"+actual_img).style.display = "none";
			
			document.getElementById("container_path_image_" + actual_img).setAttribute("name", "container_image["+actual_img +"][0]");
			document.getElementById("container_name_image_" + actual_img).setAttribute("name", "container_image["+actual_img +"][1]");
			document.getElementById("container_path_image_" + actual_img).readOnly = true;
			document.getElementById("container_name_image_" + actual_img).readOnly = true;
			document.getElementById("name_image_" + actual_img).readOnly = true;


			var buttons = 	"<button class = \"btn btn-info\" onclick = \" verImagen('" + document.getElementById("tmp_image_"+actual_img).value +"');\" type=\"button\" style=\"margin-top:25px; margin-right:10px; font-size: 12px;\"> Ver </button>" +
							"<button class = \"btn btn-info\" onclick = \" eliminarImagen('" + actual_img +"');\" type=\"button\" style=\"margin-top:25px; font-size: 12px;\"> Eliminar  </button>" ;
			
			$("#button_add_image_"+actual_img).remove();			
			$("#element_row_buttons_" + actual_img).append(buttons);


			siguiente_img = elementos_img.length ;

			for (var i = 0; i < elementos_img.length; i++) {

				var same = false;
				
				for(var j = 0; j < elementos_img.length; j++) {
					if (i== elementos_img[j])
					{
						same = true;
					}
				}

				if (same==false)
				{
					siguiente_img = i;
					break;
				}

			}

			$("#leyenda_imagenes_" + actual_img).remove();
			actual_img = siguiente_img;
			
			var element = 	"<div class=\"row\" id =\"row_imagen_"+ siguiente_img + "\">" +
								"<div class=\"col-sm-5\" style=\"padding-left: 0px;\">" +
									"<label><font color=\"red\"></font>Nombre </label>" +
									"<input class = \"info_name_image\" type=\"text\" id=\"container_name_image_"+ siguiente_img +"\" placeholder=\"Ingrese un nombre para la imagen\"/>" +
									"<span class=\"error\" aria-live=\"polite\" id =\"validate_name_image_" + siguiente_img +"\"></span>"+
								"</div>" +
								"<div class=\"col-sm-5\" style=\"padding-left: 0px;\">" +
								"<div><label><font color=\"red\"></font>Imagen </label></div>" +
									"<input class = \"info_data_image\" id=\"name_image_" +siguiente_img +"\" placeholder=\"Seleccione un archivo\"/>" +
									"<span class=\"error\" aria-live=\"polite\" id =\"validate_content_image_"+siguiente_img+"\"></span>"+
									"<input class = \"info_data_image\" id=\"tmp_image_" + siguiente_img + "\" placeholder=\"Seleccione un archivo\" disabled=\"disabled\" style = \"display:none;\" />" +
									"<div class=\"fileUpload btn btn-primary\" id = \"element_row_"+siguiente_img+"\" style=\" background-color: #3299bb; font-size: 12px;\" \>" +
										"<span>Subir imagen</span>" +
										"<input type=\"file\" name =\"\" multiple=\"multiple\" id=\"container_path_image_"+ siguiente_img +"\" class=\"upload_image\" value=\"image_temp\" accept=\"image/*\" onchange=\"loadFile(event,"+ siguiente_img +")\">" +
									"</div>"+
								"</div>" +
								"<div class=\"col-sm-2\" id = \"element_row_buttons_" + siguiente_img +"\" style=\"padding-left: 0px;\">" +
								"<button class=\"btn btn-success\" style =\"margin-bottom: 15px; margin-top: 25px; background-color: #3299bb; border-color: #3299bb; font-size: 12px;\" type=\"button\" onclick = \"agregarImagen();\"  id = \"button_add_image_"+siguiente_img+"\">"+
									"<span class=\"glyphicon glyphicon-plus\" ></span> Agregar"+
								"</button>"+
								"</div>"+
							"</div>" + 
							"<div id=\"leyenda_imagenes_" + siguiente_img+ "\">" +
							"<div class = \"page-header\" >"   +
								"<h4>Imagenes agregadas</h4>"+
							"</div>" +
						   "</div>";


			$("#new_content_image").prepend(element);
	  }
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

		console.log(elementos_img);
		if (elementos_img.length == 0)
		{
			 $("#leyenda_imagenes_" + siguiente_img).append("<p id =\"leyenda_imagenes_p_" + siguiente_img +"\" align=\"middle\"> No existen ninguna imagen agregada</p>");
		}

	}

	function agregarVideo(){
	
		var video_name = document.getElementsByName("video_name")[actual_video].value;
		var video_path = document.getElementsByName("video_path")[actual_video].value;


	    if(video_name == "" || video_path == "" ) {
		   
		   	if (video_name == "") {
		    	$("#validate_name_video p" ).remove();
		    	$("#validate_name_video").append("<p style = \"color:red; font-weight: bold;\">*El nombre del video no puede ser un campo vacio</p> ")
	    		setTimeout(function() { $("#validate_name_video p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_video p").remove(); }, 100000);
		    }
		    else
		    {
		    	$("#validate_name_video p" ).remove();
		    	$("#validate_name_video").append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
	    		setTimeout(function() { $("#validate_name_video p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_video p").remove(); }, 100000);
		    }

		    if (video_path == "") {
		    	$("#validate_content_video p" ).remove();
		    	$("#validate_content_video").append("<p style = \"color:red; font-weight: bold;\">*El campo de la url no puede ser un vacio</p> ")
	    		setTimeout(function() { $("#validate_content_video p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_content_video p").remove(); }, 100000);
		    }
		    else
		    {
			    var patron = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;

		    	if (video_path.match(patron))
		    	{
			    	$("#validate_content_video p" ).remove();
			    	$("#validate_content_video").append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
		    		setTimeout(function() { $("#validate_content_video p").fadeOut(); }, 1500); 
		    		setTimeout(function(){$("#validate_content_video p").remove(); }, 100000);
		    	}
		    	else
		    	{
			  		$("#validate_content_video p" ).remove();
			    	$("#validate_content_video").append("<p style = \"color:red; font-weight: bold;\">*El campo de la url es inválido</p> ")
		    		setTimeout(function() { $("#validate_content_video p").fadeOut(); }, 1500); 
		    		setTimeout(function(){$("#validate_content_video p").remove(); }, 100000);  		
		    	}
		    }

		}
	    else
	    {

			var patron = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;

	    	if (video_path.match(patron))
	    	{
				siguiente_video = elementos_video.length ;

				for (var i = 0; i < elementos_video.length; i++) {

					var same = false;
					for(var j = 0; j < elementos_video.length; j++){
						if(i== elementos_video[j])
						{
							same = true;
						}
					}

					if (same==false)
					{
						siguiente_video = i;
						break;
					}

				}

				var element = "<div class=\"row\" id =\""+ "row_video_" + siguiente_video  +"\">" + 
				  				"<div class=\"col-sm-5\" style=\"padding-left: 0px;\">" +
								"<label><font color=\"red\" style=\"margin-top:10px;\"></font>Nombre </label>" +
									"<input class = \"info_video\" type=\"text\" id = \"CV\" name=\"container_video["+ siguiente_video +"][0]\" value = "+ video_name +" readonly>" +
								"</div>"+
								"<div class=\"col-sm-5\" style=\"padding-left: 0px;\">" +
									"<label><font color=\"red\" style=\"margin-top:10px;\"></font> Video </label>" +
									"<input class = \"info_data\" type=\"text\" id = \"CV\" name=\"container_video["+ siguiente_video +"][1]\" value =" + video_path +" readonly>" +
								"</div>" +
								"<div class=\"col-sm-2\" style=\"padding-left: 0px;\">" +
									"<button class = \"btn btn-info\" onclick = \" verVideo('" + video_path +"');\" type=\"button\" style=\"margin-top:25px; margin-right:10px; font-size: 12px;\"> Ver </button>" +
									"<button class = \"btn btn-info\" onclick = \" eliminarVideo('" + siguiente_video +"');\" type=\"button\" style=\"margin-top:25px; font-size: 12px;\"> Eliminar  </button>" +
								"</div>" +
						      "</div>";

				$("#new_content").prepend(element);

				document.getElementsByName("video_name")[actual_video].value = "";
				document.getElementsByName("video_path")[actual_video].value = "";
				elementos_video.push(siguiente_video);

				if (elementos_video.length != 0)
				{
					$("#leyenda_videos_p").remove();
				}
			}
			else
			{
				
		    	$("#validate_name_video p" ).remove();
		    	$("#validate_name_video").append("<p style = \"color:green; font-weight: bold;\">*Dato ingresado correctamente</p> ")
	    		setTimeout(function() { $("#validate_name_video p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_name_video p").remove(); }, 100000);

		  		$("#validate_content_video p" ).remove();
		    	$("#validate_content_video").append("<p style = \"color:red; font-weight: bold;\">*El campo de la url es inválido</p> ")
	    		setTimeout(function() { $("#validate_content_video p").fadeOut(); }, 1500); 
	    		setTimeout(function(){$("#validate_content_video p").remove(); }, 100000); 
			}
	    }
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

		if (elementos_video.length == 0)
		{
			$("#leyenda_videos").append("<p id =\"leyenda_videos_p\" align=\"middle\"> No existen ningun videos agregados</p>");
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

		<div class = "page-header" >   
			<h3>Información general</h3>
		</div> 
		<form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" action="/admin/mapadd/<?php echo $tourId ?>"  onsubmit="return validateForm()" novalidate>
			<fieldset>
				<div class="row">
					<div class="col-sm-6" style="padding-left: 0px; padding-top: 8px; padding-right: : 0px;">
							<label><font color="red"></font>Nombre</label>
							<input class = "form-control" type="text" id="name" name="name" placeholder="Ingrese el nombre del punto">
							<span class="error" aria-live="polite" id ="name_point_validate"></span>
					</div>
					<div class="col-sm-6" style="padding-left: 0px; padding-top: 8px; padding-right: : 0px;">
							<label><font color="red"></font>Latitud</label>
							<input class = "form-control" type="number" id="latitude" name="latitude" min="7.967310" max="11.302868" step="0.0000001" placeholder="Ingrese la latitud el punto" >
							<span class="error" aria-live="polite" id ="latitude_validate"></span>
					</div>
				</div>

				<div class="row" style="padding-top: 4px;">
					 <div class="col-sm-6" style="padding-left: 0px; padding-right: : 0px;">
							<label><font color="red"></font>Longitud</label>
							<input class = "form-control" type="number" id="longitude" name="longitude" min="-86.210410" max="-82.381674" step="0.0000001" placeholder="Ingrese la longitud del punto" >
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
				<div class="row">
					<label><font color="red"></font>Descripción </label>
					<textarea class = "info_data" type="text" id="descripcion_point" name="descripcion_point" placeholder="Ingrese un texto descriptivo del punto" rows="10"></textarea>
				</div>
			</div>

			<div id="contenido_imagenes" class="tabcontent" style="overflow-y: scroll; height:350px;">

				<div id ="new_content_image">
					<div class="row" id ="row_imagen_0">
						<div class="col-sm-5" style="padding-left: 0px;">
							<label><font color="red"></font>Nombre </label>
							<input class = "info_name_image" type="text" id="container_name_image_0" placeholder="Ingrese un nombre para la imagen"/>
							<span class="error" aria-live="polite" id ="validate_name_image_0"> </span>
						</div>
						<div class="col-sm-5" style="padding-left: 0px;">
							<div><label><font color="red"></font>Imagen </label></div>
							<input class = "info_data_image" id="name_image_0" placeholder="Seleccione un archivo" readonly />
							<span class="error" aria-live="polite" id ="validate_content_image_0"></span>
							<input class = "info_data_image" id="tmp_image_0" placeholder="Seleccione una imagen" disabled="disabled" style = "display:none;"/ readonly>
							<div class="fileUpload btn btn-primary" id = "element_row_0" style=" background-color: #3299bb; font-size: 12px;" >
								<span>Subir imagen</span>
								<input type="file"  class = "upload_image" multiple="multiple" id="container_path_image_0" value="image_temp" accept="image/*" onchange="loadFile(event,0)">
							</div>
						</div>
						<div class="col-sm-2" id = "element_row_buttons_0" style="padding-left: 0px;"> 
							<button class="btn btn-success" style ="margin-bottom: 15px; margin-top: 25px; background-color: #3299bb; border-color: #3299bb; font-size: 12px;" type="button" onclick = "agregarImagen();"  id = "button_add_image_0">
								<span class="glyphicon glyphicon-plus" ></span> Agregar
							</button>
						</div>
					</div>
	 				
	 				<div id="leyenda_imagenes_0"> 
						<div class = "page-header" >   
							<h4>Imagenes agregadas</h4>
						</div> 
						<p  id ="leyenda_imagenes_p_0" align="middle"> No existen ninguna imagen agregada</p>
					</div>
				</div>
			</div>

			<div id="contenido_videos" class="tabcontent" style="overflow-y: scroll; height:350px;">

				<div class="row">
					<div class="col-sm-5" style="padding-left: 0px;">
						<label><font color="red"></font>Nombre </label>
						<input class = "info_data" type="text" name="video_name" placeholder="Ingrese el nombre del video" id ="1">
						<span class="error" aria-live="polite" id ="validate_name_video"></span>
					</div>
					<div class="col-sm-5" style="padding-left: 0px;">
						<label><font color="red"></font> Video </label>
						<input class = "info_data" type="text" name="video_path" placeholder="Ingrese la url del video" id = "1">
						<span class="error" aria-live="polite" id ="validate_content_video"></span>
					</div>
					<div class="col-sm-1" style="padding-left: 0px;">
					<button class="btn btn-success" style ="margin-bottom: 15px; margin-top: 25px; background-color: #3299bb; border-color: #3299bb; font-size: 12px;" type="button" onclick = "agregarVideo();">
						<span class="glyphicon glyphicon-plus"></span> Agregar
					</button>
					</div>
				</div>

				<div class = "page-header" >   
					<h4>Videos agregados</h4>
				</div> 
				<div id="leyenda_videos"> 
					<p  id ="leyenda_videos_p" align="middle"> No existen ningun video agregado</p>
				</div>

				<div id ="new_content"> </div>
			</div>

			<div class="row" style = "margin-top: 35px;"">
				<div class="col-sm-6" style="padding-left: 0px;">
					<button class="btn btn-primary"  type="submit">Guardar</button>       
					<button class="btn btn-danger"  type="button" onclick="window.location.href='/admin/mapindex/<?php echo $tourId ?>'">Cancelar</button>       
				</div>
			</div>
		</form>
	</div>
</div>




<script >

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
	    var name = document.getElementById("name").value;	    

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