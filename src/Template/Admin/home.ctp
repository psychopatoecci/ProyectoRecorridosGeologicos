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
<style>
    .imagen {
        margin: 6px;
        padding: 6px;
    }
    img {
        margin-bottom: 5px;
    }
</style>
<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>
<div class = "col-md-12">
    <div class = "page-header" >   
        <h2><?php echo $title; ?></h2>
    </div> 
        <div style="padding-bottom:20px; padding-top: 10px; padding-left:20px">
            <?= $this->Html->link('&#8194;<span class="glyphicon glyphicon-plus"></span> Agregar imagen&#8194;', ['agregar', 'controller'=>'admin','action' => 'home'],['class' => 'btn btn-success','escape' => false]) ?>
            <?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
                <!--<td><img class="img" id="iimm" src="<?php echo $image ->link_path;?>" height="300" width="500"></td>-->
                <!--<td><textarea name="descripcion" cols="60" rows="5"><?php echo $text->description;  ?></textarea></td>-->
                <td><?php echo $this->Form->file('image', ['id' => 'boton']); ?>
                    <?php echo $this->Form->submit('Aceptar'); ?>
                </td>
                <!--<?php echo $this->Form->hidden('image_id', ['value' => $image->id]); ?>-->
                <!--<?php echo $this->Form->hidden('text_id', ['value' => $text->id]); ?>-->
            <?php echo $this->Form->end();?>
        </div>
        <table>
            <?php foreach ($images as $image): ?>
                <td class="imagen">
                    <img width="200" height="200" draggable="true" src="<?php echo $initialPath.$image ['link_path'] ?>"></img>
                    <br />
                    <form method="post" onsubmit="return confirm ('¿Desea eliminar la imagen?');" action="/admin/home">
                        <input type="hidden" name="imagen"value="<?=$image ['id']?>"></input>
                        <button  class="btn btn-block btn-danger" > Eliminar <div class="glyphicon glyphicon-remove">&#8194;</div></button>
                    </form>
                </td>
            <?php endforeach; ?>
        </table>
</div>
