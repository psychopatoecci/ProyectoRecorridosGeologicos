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

<?= $this->Html->css('admin.css') ?>

<div class="help-tip">
	<p>Mediante esta página usted puede administrar el contenido de la pestaña asociada al recorrido de la Península de Santa Elena y alrededores.</p>
</div>

<div class="row">
    <div class = "col-md-12">
       <div class = "page-header" >   
            <h2><?php echo $title; ?></h2>
       </div>
	</div>
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
	                            <td><textarea name="descripcion" cols="60" rows="10"><?php echo $text[0]->description;  ?></textarea></td>
	                            <td><?php echo $this->Form->file('imagen_fondo', ['id' => 'boton']); ?>
									<?php echo $this->Form->submit('Aceptar'); ?>
								</td>
								<?php echo $this->Form->hidden('image_id', ['value' => $images[0]->id]); ?>
								<?php echo $this->Form->hidden('text_id', ['value' => $text[0]->id]); ?>
                            <?php echo $this->Form->end();?>
                        </tr>
                 </tbody>
             </table>
</div>