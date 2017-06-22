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

$cakeDescription = 'Recorrido Isla Bolaños';
?>

<?= $this->Html->css('admin.css') ?>

<div class="help-tip">
  <p>
    Mediante esta página usted puede administrar el contenido de la pestaña asociada al recorrido de Isla Bolaños y alrededores.
  </p>
</div>

<div class="container-fluid">
  <div class="container" style="padding:25px;">
    
    <div class = "page-header" >   
            <h2><?php echo $title; ?></h2>
    </div>

    <div class="page-header" style="padding-left: 10px;">
        <h3>
          Modificar imagen de fondo y descripción
        </h3>
    </div>

    <div class = "table-responsive">
            <table class = "table table-striped table-hover">
                <thead>
                    <tr>
                      <th scope="col" class="actions">Imagen de fondo</th>
                      <th scope="col" class="actions">Texto descriptivo</th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                       <tr>
                          <?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
                            <td><img class="img" id="img0" src="<?php echo $images[0]->link_path;?>" height="200" width="275"></td>
                              <td><textarea name="descripcion" cols="60" rows="10"><?php echo $text[0]->description;  ?></textarea></td>
                              <td>
                                  <label class="btn btn-primary">
                                    <?php echo $this->Form->file('imagen_fondo', ['class' => 'btn btn-success',  'onchange'=>'changeImage(this, img0)']); ?>
                                    Cambiar imagen
                                  </label>
                  <?php echo $this->Form->submit('Aceptar', ['class' => 'btn btn-success', 'style' => 'background-color : #3299bb; border-color : #3299bb;']); ?>
                  <?php echo $this->Form->button('Cancelar', ['class'=>'btn btn-danger', 'type' => 'button', 'onclick' => 'cancel()']); ?>
                </td>
                <?php echo $this->Form->hidden('image_id', ['value' => $images[0]->id]); ?>
                <?php echo $this->Form->hidden('text_id', ['value' => $text[0]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>
                 </tbody>
             </table>
          </div>


  </div> <!-- Fin del container -->
</div> <!--  Fin del container-fluid -->

          <?php echo $this->Form->create('subir_enlaces', ['url'=>"/admin/toursLinks?page=tourBolanos"]); ?>
<div class="container-fluid" >
<div class="container" id="urlForm" style="padding:25px;">
	<div class="row">
	    <div class="page-header" style="padding-left: 10px;">
        <h3>Documentos de interés</h3>
      </div>
	</div>
	
	<div class="row">
		<div class="col-md-9">
	    	<button type="button" class="btn btn-success" onclick="agregar()" style="background-color : #3299bb; border-color : #3299bb;">
	    	  <span class="glyphicon glyphicon-plus" ></span> Agregar
	    	</button>
	    </div>
	</div>

	<?php for ($i = 0; $i < sizeof($url); $i++) { ?>
	<div class="row" id="linkInput<?= $i ?>">
	    <div class="col-md-9 links">
	    	<label>Descripción</label>
	    	<?php echo $this->Form->text('description'.$i, ['value'=>$url[$i]->description, 'placeholder'=>'Descripción', 'id' => 'descripcion']); ?>
	    	<label>URL</label>
	    	<?php echo $this->Form->url('url'.$i, ['value'=>$url[$i]->link_path, 'placeholder'=>'Enlace', 'id' => 'enlace']); ?>
	    	<?php echo $this->Form->button('Eliminar', ['class'=>'btn btn-danger', 'type'=>'button', 'onclick'=>'eliminar(linkInput'.$i.')']); ?>
		</div>
	</div>
	<?php } ?>
  </div> <!-- fin del container -->

   <div class="container" style="padding:25px;">
    <div class="row">
      <div class="col-md-1">
        <?php echo $this->Form->submit('Guardar', ['class' => 'btn btn-success', 'style' => 'background-color : #3299bb; border-color : #3299bb;']); ?>
      </div>
      <div class="col-md-1">
        <?php echo $this->Form->button('Cancelar', ['class'=>'btn btn-danger', 'type' => 'button', 'onclick' => 'cancel()']);?>
      </div>   
    </div>
  </div>
</div>

<?php echo $this->Form->hidden('page', ['value' => 'tourBolanos']); ?>
<?php echo $this->Form->end();?>

<style type="text/css">
	
	input[type="file"] {
	    display: none;
	}

	.btn {
    	margin-bottom: 10px;
	}

	.links .btn-danger{
		margin-top: 5px;
	}

</style>

<script>
  
    var current_length 		= $("input[name^='url']").length;
    var min_length			= 1;
    var idCont = current_length;

    function agregar() {
    	var container="#urlForm";
    	$(container).append('<div class="row" id="linkInput'+ current_length + '">\
							<div class="col-md-9 links">\
                 			<label>Descripción</label>\
                 			<input name="description'+ current_length + '" class="form-control" type="text" placeholder="Descripción">\
                 			<label>URL</label>\
                 			<input name="url'+ current_length + '" class="form-control" type="url" required pattern="https?://.+" placeholder="Enlace">\
                			<button class="btn btn-danger" type="button" onclick="eliminar(linkInput'+current_length+')">Eliminar</button>\
              				</div>\
              				</div>');
    	current_length++;
    }
    
    function eliminar(id) {
    	if(current_length > min_length){
        	$(id).remove(); 
        	current_length--;
    	}else{
    		alert("Al menos debe contener un documento.");
    	}
    }

    function changeImage(input, imgId) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(imgId).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function cancel() {
        location.reload();
    }
</script>
