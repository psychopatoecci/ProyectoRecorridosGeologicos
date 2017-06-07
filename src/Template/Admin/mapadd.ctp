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
<script>

	function agregarImagen(){
	/*
		var video_name = document.getElementsByName("video_name")[0].value;
		var video_path = document.getElementsByName("video_path")[0].value;

		console.log(video_name);

		var elements = document.getElementsByClassName("info_video");
		console.log(elements.length);

		var num = elements.length ;
*/
		var element = "<div class=\"row\"> " +
  							"<div class=\"col-sm-6\">" +
								"<label><font color=\"red\"></font>Nombre </label>"+
								"<input class = \"info_name_image\" type=\"text\" id=\"container_name_image_\" name=\"container_name_image[0]\" >"+
							"</div>" +
				 			"<div class=\"col-sm-6\">"+
				 			"<div><label><font color=\"red\"></font>Imagen </label></div>"+
								"<input class = \"info_data_image\" id=\"name_image_0\" placeholder=\"Seleccione un archivo\" disabled=\"disabled\" />"+
								"<div class=\"fileUpload btn btn-primary\">" +
			    					"<span>Subir</span>" +
			    					"<input type=\"file\" name =\"container_path_image[0]\" multiple=\"multiple\" id=\"container_path_image_0\" class=\"upload_image\">"+
								"</div>"+
							"</div>"+
						"</div>";

/*
		"<div class=\"row\" id =\""+ "row_video_" + num  +"\">" + 
		  				"<div class=\"col-sm-6\">" +
						"<label><font color=\"red\" style=\"margin-top:10px;\"></font>Nombre </label>" +
							"<input class = \"info_video\" type=\"text\" id = \"CV\" name=\"container_name["+ num +"]\" value = "+ video_name +" readonly>" +
						"</div>"+
						"<div class=\"col-sm-6\">" +
							"<label><font color=\"red\" style=\"margin-top:10px;\"></font> Video </label>" +
							"<input class = \"info_data\" type=\"text\" id = \"CV\" name=\"container_path["+ num +"]\" value =" + video_path +" readonly>" +
						"</div>" +
						"<div class=\"col-sm-6\">" +
							"<button class = \"btn btn-danger\" onclick = \" eliminarVideo('row_video_" + num +"');\" type=\"button\" style=\"margin-top:10px;\"> Eliminar </button>" +
						"</div>" +
				      "</div>";
*/
		$("#new_content_image").prepend(element);

	}

	function agregarVideo(){
	
		var video_name = document.getElementsByName("video_name")[0].value;
		var video_path = document.getElementsByName("video_path")[0].value;

		console.log(video_name);

		var elements = document.getElementsByClassName("info_video");

		var num = elements.length ;

		for (var i = 0; i < elements.length; i++) {

			var comparative = "container_name["+i+"]"
			var same = false;
			for(var j = 0; j < elements.length; j++){

				if (comparative == elements[j].name)
				{
					same=true;
				}
			}

			if (same==false)
			{
				num = i;
				break;
			}

		}

		var element = "<div class=\"row\" id =\""+ "row_video_" + num  +"\">" + 
		  				"<div class=\"col-sm-6\">" +
						"<label><font color=\"red\" style=\"margin-top:10px;\"></font>Nombre </label>" +
							"<input class = \"info_video\" type=\"text\" id = \"CV\" name=\"container_name["+ num +"]\" value = "+ video_name +" readonly>" +
						"</div>"+
						"<div class=\"col-sm-6\">" +
							"<label><font color=\"red\" style=\"margin-top:10px;\"></font> Video </label>" +
							"<input class = \"info_data\" type=\"text\" id = \"CV\" name=\"container_path["+ num +"]\" value =" + video_path +" readonly>" +
						"</div>" +
						"<div class=\"col-sm-6\">" +
							"<button class = \"btn btn-danger\" onclick = \" eliminarVideo('row_video_" + num +"');\" type=\"button\" style=\"margin-top:10px;\"> Eliminar </button>" +
						"</div>" +
				      "</div>";

		$("#new_content").append(element);

		document.getElementsByName("video_name")[0].value = "";
		document.getElementsByName("video_path")[0].value = "";
	}

	function eliminarVideo(name_row){
		$("#" + name_row ).remove();
	}
</script>

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
					<input class = "form-control" type="number" id="latitude" name="latitude" step="0.01">
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
			<button class="btn btn-success" style ="margin-bottom: 15px;" type="button" onclick = "agregarImagen();" ><span class="glyphicon glyphicon-plus"></span> Agregar</button>
			<div id ="new_content_image">
			<div class="row">
  				<div class="col-sm-6">
				<label><font color="red"></font>Nombre </label>
					<input class = "info_name_image" type="text" id="container_name_image_0" name="container_name_image[0]" >
				</div>
				 <div class="col-sm-6">
				 	<div><label><font color="red"></font>Imagen </label></div>
					<input class = "info_data_image" id="name_image_0" placeholder="Seleccione un archivo" disabled="disabled" />
					<div class="fileUpload btn btn-primary">
			    		<span>Subir</span>
			    		<input type="file" name ="container_path_image[0]" multiple="multiple" id="container_path_image_0" class="upload_image">
					</div>
				</div>
			</div>
			 </div>

			<div class = "page-header" >   
	            <h2>Agregar videos</h2>
	       </div> 
			<button class="btn btn-success" style ="margin-bottom: 15px;" type="button" onclick = "agregarVideo();"><span class="glyphicon glyphicon-plus"></span> Agregar</button>
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
			
			<div class="row" style = "margin-top: 35px;>
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


</style>

<script type="text/javascript">
	document.getElementById("container_path_image_0").onchange = function () {
    	document.getElementById("name_image_0").value = this.files[0].name; ;
	};
</script>