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

<script>

	function agregarImagen(){

		var button_id = document.getElementById("button_add_image").value;
		var elements = document.getElementsByClassName("upload_image_list");
		var temp_file = document.getElementById("tmp_image_" + button_id).value;
		
		console.log(elements.length);

		var num = elements.length ;

		for (var i = 0; i < elements.length; i++) {

			var comparative = "container_path_image["+i+"]"
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

		
		var element = 	"<div class=\"row\" id =\"row_imagen_"+ num + "\">" +
							"<div class=\"col-sm-6\">" +
								"<label><font color=\"red\"></font>Nombre </label>" +
								"<input class = \"info_name_image\" type=\"text\" id=\"container_name_image_"+ num +"\" name=\"container_name_image[" + num+"]\" />" +
							"</div>" +
							"<div class=\"col-sm-6\">" +
							"<div><label><font color=\"red\"></font>Imagen </label></div>" +
								"<input class = \"info_data_image\" id=\"name_image_" + num +"\" placeholder=\"Seleccione un archivo\"/>" +
								"<input class = \"info_data_image\" id=\"tmp_image_" + num + "\" placeholder=\"Seleccione un archivo\" disabled=\"disabled\" style = \"display:none;\" />" +
								"<div class=\"fileUpload btn btn-primary\" id = \"element_row_"+num+"\"\>" +
									"<span>Subir</span>" +
									"<input type=\"file\" name =\"container_path_image["+num+"]\" multiple=\"multiple\" id=\"container_path_image_"+ num +"\" class=\"upload_image_list\" value=\"image_temp\" accept=\"image/*\" onchange=\"loadFile(event,"+ num +")\">" +
								"</div>"+
							"</div>" +
							"<div class=\"col-sm-6\" id = \"element_row_buttons_" + num +"\">" +
							"</div>"+
						"</div>";


		$("#new_content_image").prepend(element);
		
		var buttons = 	"<button class = \"btn btn-info\" onclick = \" verImagen('" + temp_file +"');\" type=\"button\" style=\"margin-top:10px; margin-right:10px;\"> Ver </button>" +
						"<button class = \"btn btn-danger\" onclick = \" eliminarVideo('row_imagen_" + button_id +"');\" type=\"button\" style=\"margin-top:10px; \"> Eliminar  </button>" ;
						
		$("#element_row_buttons_" + button_id).append(buttons);
		document.getElementById("tmp_image_"+button_id).style.display = "none";
		document.getElementById("element_row_"+button_id).style.display = "none";
		
		document.getElementById("button_add_image").value = num;
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
		$("#" + name_row ).remove();
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
							"<button class = \"btn btn-info\" onclick = \" verVideo('" + video_path +"');\" type=\"button\" style=\"margin-top:10px; margin-right:10px;\"> Ver </button>" +
							"<button class = \"btn btn-danger\" onclick = \" eliminarVideo('row_video_" + num +"');\" type=\"button\" style=\"margin-top:10px; \"> Eliminar  </button>" +
						"</div>" +
				      "</div>";

		$("#new_content").prepend(element);

		document.getElementsByName("video_name")[0].value = "";
		document.getElementsByName("video_path")[0].value = "";
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
			<button class="btn btn-success" style ="margin-bottom: 15px;" type="button" onclick = "agregarImagen();" value ="0" id = "button_add_image">
				<span class="glyphicon glyphicon-plus" ></span> Agregar
			</button>
				
			<div id ="new_content_image">
				<div class="row" id ="row_imagen_0">
					<div class="col-sm-6">
						<label><font color="red"></font>Nombre </label>
						<input class = "info_name_image" type="text" id="container_name_image_0" name="container_name_image[0]" />
					</div>
					<div class="col-sm-6">
					<div><label><font color="red"></font>Imagen </label></div>
						<input class = "info_data_image" id="name_image_0" placeholder="Seleccione un archivo"  />
						<input class = "info_data_image" id="tmp_image_0" placeholder="Seleccione un archivo" disabled="disabled" style = "display:none;"/>
						<div class="fileUpload btn btn-primary" id = "element_row_0">
							<span>Subir</span>
							<input type="file" name ="container_path_image[0]" multiple="multiple" id="container_path_image_0" class="upload_image_list" value="image_temp" accept="image/*" onchange="loadFile(event,0)">
						</div>
					</div>
					<div class="col-sm-6" id = "element_row_buttons_0"> 
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



<script>
  var loadFile = function(event,id) {
    var output = document.getElementById('container_path_image_' + id);

    var data_point = new Array();
    data_point.push({src:URL.createObjectURL(event.target.files[0])}); 

    document.getElementById('tmp_image_' + id).value = URL.createObjectURL(event.target.files[0]);
	document.getElementById('name_image_'+ id).value =  output.files[0].name;

    $.magnificPopup.open({
      items: data_point,
      gallery: {
        enabled: true
      },
      type: 'image' 
    });

  };



</script>

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

.fileUpload input.upload_image_list {
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
