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

		var image_name = document.getElementsByName("image_name")[0].value;
		var image_id = document.getElementsByName("image_id")[0].value;
		var image_path = document.getElementsByName("image_path")[0].value;


var x = document.getElementById("image_path");
var txt = "";
if ('files' in x) {
    if (x.files.length == 0) {
        txt = "Select one or more files.";
    } else {
        for (var i = 0; i < x.files.length; i++) {
            txt += "<br><strong>" + (i+1) + ". file</strong><br>";
            var file = x.files[i];
            if ('tmp_name' in file) {
                txt += "tmp_name: " + file.tmp_name + "<br>";
            }
            if ('size' in file) {
                txt += "size: " + file.size + " bytes <br>";
            }
        }
    }

    console.log(txt);
} 

		var image_temp = document.getElementsByName("image_temp")[0].value;

		var elements = document.getElementsByClassName("upload_image_list");
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

		var element = "<div class=\"row\" id =\""+ "row_imagen_" + num  +"\"> " +
  							"<div class=\"col-sm-6\">" +
								"<label><font color=\"red\"></font>Nombre </label>"+
								"<input class = \"info_name_image\" type=\"text\" id=\"container_name_image_"+ num+"\" name=\"container_name_image["+num+"]\" value =\""+ image_name+"\">"+
							"</div>" +
				 			"<div class=\"col-sm-6\">"+
				 			"<div><label><font color=\"red\"></font>Imagen </label></div>"+
								"<input class = \"info_data_image\" id=\"name_image_"+num+"\" placeholder=\"Seleccione un archivo\" disabled=\"disabled\" value=\""+ image_id+"\"/>"+
								"<div class=\"fileUpload btn btn-primary\" style= \"display:none;\">" +
			    					"<span>Subir</span>" +
			    					"<input type=\"file\" name =\"container_path_image["+num+"]\" multiple=\"multiple\" id=\"container_path_image_"+num+"\" class=\"upload_image_list\" value=\""+image_temp+"\" >"+
								"</div>"+
							"</div>"+
							"<div class=\"col-sm-6\">" +
							"<button class = \"btn btn-info\" onclick = \" verImagen('" + image_temp +"');\" type=\"button\" style=\"margin-top:10px; margin-right:10px;\"> Ver </button>" +
							"<button class = \"btn btn-danger\" onclick = \" eliminarImagen('row_imagen_" + num +"');\" type=\"button\" style=\"margin-top:10px;\"> Eliminar </button>" +
							"</div>" +
						"</div>";




		$("#new_content_image").prepend(element);
	
		$("#container_path_image_"+num)[0].files[0] = $("#image_path")[0].files[0];


		document.getElementById("container_path_image_"+num).files = document.getElementById("image_path").files;
 	
		document.getElementsByName("image_name")[0].value = "";
		document.getElementsByName("image_id")[0].value = "";
		document.getElementsByName("image_path")[0].value = "";

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
			<div class="row">
  				<div class="col-sm-6">
				<label><font color="red"></font>Nombre </label>
					<input class = "info_name_image" type="text" id="image_name" name="image_name" >
				</div>
				 <div class="col-sm-6">
				 	<div><label><font color="red"></font>Imagen </label></div>
					<input class = "info_data_image" id="image_id" name = "image_id" placeholder="Seleccione un archivo" disabled="disabled"  />
					<input class = "info_data_image" id="image_temp" name = "image_temp" placeholder="Seleccione un archivo" disabled="disabled" />

					<div class="fileUpload btn btn-primary">
			    		<span>Subir</span>
			    		<input type="file" name ="image_path" multiple="multiple" id="image_path" class="upload_image" accept="image/*" onchange="loadFile(event)">

					</div>
				</div>
			</div>
			<div id ="new_content_image">
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
			<input type="file" accept="image/*" id="field1" name = "hola" onchange="loadFile(event)">

			<input type="file" id="field1"/>
				<span id="field2_area"><input type="file" id="field2" name="hola2"/></span>
				
				<script>
				$('#field1').change(function(){
				    var clone = $(this).clone();
				    clone.attr('id', 'field2');
				    $('#field2_area').html(clone);
				});
				</script>

			</form>



<script>
  var loadFile = function(event) {
    var output = document.getElementById('image_path');

    var data_point = new Array();
    data_point.push({src:URL.createObjectURL(event.target.files[0])}); 

    document.getElementById('image_temp').value = URL.createObjectURL(event.target.files[0]);
	document.getElementById('image_id').value =  output.files[0].name;

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
<!--
<script type="text/javascript">
	document.getElementById("container_path_image_0").onchange = function () {
    	document.getElementById("name_image_0").value = this.files[0].name; ;
	};
</script>
-->