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
	<p>
		Esta página le permite administrar el contenido de la pestaña de Información del sitio: cambiar la imagen de fondo y su respectivo texto descriptivo.
	</p>
</div>

<div class="container-fluid">
	<div class="container" style=" padding:25px;">
		
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
                                <td><img class="img" id="img0" src="<?php echo $images[0]->link_path;?>" height="200" width="275"></td>
                                <td><textarea name="descripcion" cols="60" rows="10"><?php echo $text[0]->description;  ?></textarea></td>
                                <td>
                                    <label class="btn btn-primary">
                                    <?php echo $this->Form->file('imagen_fondo', ['class' => 'btn btn-success', 'onchange'=>'changeImage(this, img0)']); ?>
                                    Cambiar imagen
                                    </label>
                                    <?php echo $this->Form->submit('Aceptar', ['class' => 'btn btn-success']); ?>
                                    <?php echo $this->Form->button('Cancelar', ['class'=>'btn btn-danger', 'type'=>'button', 'onclick'=>'cancel()']); ?>
                                </td>
                                <?php echo $this->Form->hidden('image_id', ['value' => $images[0]->id]); ?>
                                <?php echo $this->Form->hidden('text_id', ['value' => $text[0]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>
                       <tr>
                            <?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
                                <td><img class="img" id="img1" src="<?php echo $images[1]->link_path;?>" height="200" width="275"></td>
                                <td><textarea name="descripcion" cols="60" rows="10"><?php echo $text[1]->description;  ?></textarea></td>
                                <td>
                                    <label class="btn btn-primary">
                                    <?php echo $this->Form->file('imagen_fondo', ['class' => 'btn btn-success', 'onchange'=>'changeImage(this, img1)']); ?>
                                    Cambiar imagen
                                    </label>
                                    <?php echo $this->Form->submit('Aceptar', ['class' => 'btn btn-success']); ?>
                                    <?php echo $this->Form->button('Cancelar', ['class'=>'btn btn-danger', 'type' => 'button', 'onclick' => 'cancel()']); ?>
                                </td>
                                <?php echo $this->Form->hidden('image_id', ['value' => $images[1]->id]); ?>
                                <?php echo $this->Form->hidden('text_id', ['value' => $text[1]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>
                        <tr>
                            <?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
                                <td><img class="img" id="img2" src="<?php echo $images[2]->link_path;?>" height="200" width="275"></td>
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
                                <td>
                                    <label class="btn btn-primary">
                                    <?php echo $this->Form->file('imagen_fondo', ['class' => 'btn btn-success', 'onchange'=>'changeImage(this, img2)']); ?>
                                    Cambiar imagen
                                    </label>
                                    <?php echo $this->Form->submit('Aceptar', ['class' => 'btn btn-success']); ?>
                                    <?php echo $this->Form->button('Cancelar', ['class'=>'btn btn-danger', 'type' => 'button', 'onclick' => 'cancel()']); ?>
                                </td>
                                <?php echo $this->Form->hidden('image_id', ['value' => $images[2]->id]); ?>
                                <?php echo $this->Form->hidden('text_id', ['value' => $text[2]->id]); ?>
                                <?php echo $this->Form->hidden('text2_id', ['value' => $text[3]->id]); ?>
                            <?php echo $this->Form->end();?>
                       </tr>
                       <tr>
                            <?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
                                <td><img class="img" id="img3" src="<?php echo $images[3]->link_path;?>" height="200" width="275"></td>
                                <td><textarea name="descripcion" cols="60" rows="10"><?php echo $text[4]->description;  ?></textarea></td>
                                <td>
                                    <label class="btn btn-primary">
                                    <?php echo $this->Form->file('imagen_fondo', ['class' => 'btn btn-success', 'onchange'=>'changeImage(this, img3)']); ?>
                                    Cambiar imagen
                                    </label>
                                    <?php echo $this->Form->submit('Aceptar', ['class' => 'btn btn-success']); ?>
                                    <?php echo $this->Form->button('Cancelar', ['class'=>'btn btn-danger', 'type' => 'button', 'onclick' => 'cancel()']); ?>
                                </td>
                                <?php echo $this->Form->hidden('image_id', ['value' => $images[3]->id]); ?>
                                <?php echo $this->Form->hidden('text_id', ['value' => $text[4]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>

                 </tbody>
             </table>
        </div>

	</div> <!-- Fin del div container -->

</div> <!-- Fin del div container-fluid -->

  

<script>
    function changeImage(input, imgId) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(imgId).attr('src', e.target.result)

            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function cancel() {
        location.reload();
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

input[type="file"] {
    display: none;
}

.btn {
    margin-bottom: 10px;
}

</style>