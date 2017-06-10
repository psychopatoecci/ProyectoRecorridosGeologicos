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


<?= $this->Html->css('admin.css') ?>

	<div class="help-tip">
		<p>Esta página le permite administrar el contenido de la pestaña de Información del sitio: cambiar la imagen de fondo y su respectivo texto descriptivo.</p>
	</div>

<div class="row">
    <div class = "col-md-12">
       <div class = "page-header" >   
            <h2><?php echo $title; ?></h2>
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
	                       		<td><img class="img" id="iimm" src="<?php echo $images[0]->link_path;?>" height="300" width="500"></td>
	                            <td><textarea name="descripcion" cols="60" rows="5"><?php echo $text[0]->description;  ?></textarea></td>
	                            <td><?php echo $this->Form->file('imagen_fondo', ['id' => 'boton']); ?>
									<?php echo $this->Form->submit('Aceptar'); ?>
								</td>
								<?php echo $this->Form->hidden('image_id', ['value' => $images[0]->id]); ?>
								<?php echo $this->Form->hidden('text_id', ['value' => $text[0]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>
                       <tr>
                       		<?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
	                       		<td><img class="img" id="iimm" src="<?php echo $images[1]->link_path;?>" height="300" width="500"></td>
	                            <td><textarea name="descripcion" cols="60" rows="5"><?php echo $text[1]->description;  ?></textarea></td>
	                            <td><?php echo $this->Form->file('imagen_fondo', ['id' => 'boton']); ?>
									<?php echo $this->Form->submit('Aceptar'); ?>
								</td>
								<?php echo $this->Form->hidden('image_id', ['value' => $images[1]->id]); ?>
								<?php echo $this->Form->hidden('text_id', ['value' => $text[1]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>
                        <tr>
                       		<?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
	                       		<td><img class="img" src="<?php echo $images[2]->link_path;?>" height="300" width="500"></td>
	                       		<td>       
		                            <table>
			                       		<tr>
				                            <td><textarea name="descripcion" cols="60" rows="5"><?php echo $text[2]->description;  ?></textarea></td>
			                            </tr>
			                            <tr>
				                            <td><textarea name="descripcion2" cols="60" rows="5"><?php echo $text[3]->description;  ?></textarea></td>
			                            </tr>
		                            </table>
	                            </td>
	                            <td><?php echo $this->Form->file('imagen_fondo', ['id' => 'boton']); ?>
									<?php echo $this->Form->submit('Aceptar'); ?>
								</td>
								<?php echo $this->Form->hidden('image_id', ['value' => $images[2]->id]); ?>
								<?php echo $this->Form->hidden('text_id', ['value' => $text[2]->id]); ?>
								<?php echo $this->Form->hidden('text2_id', ['value' => $text[3]->id]); ?>
                            <?php echo $this->Form->end();?>
                  	   </tr>
                       <tr>
                       		<?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
	                       		<td><img class="img" id="iimm" src="<?php echo $images[3]->link_path;?>" height="300" width="500"></td>
	                            <td><textarea name="descripcion" cols="60" rows="5"><?php echo $text[4]->description;  ?></textarea></td>
	                            <td><?php echo $this->Form->file('imagen_fondo', ['id' => 'boton']); ?>
									<?php echo $this->Form->submit('Aceptar'); ?>
								</td>
								<?php echo $this->Form->hidden('image_id', ['value' => $images[3]->id]); ?>
								<?php echo $this->Form->hidden('text_id', ['value' => $text[4]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>

                 </tbody>
             </table>
    </div>
</div>

<script>
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

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