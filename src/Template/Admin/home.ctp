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
    .dropBox {
        width: 350px;
        height: 70px;
        padding: 10px;
        border: 1px solid #aaaaaa;    
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
        ev.target.parentNode.parentNode.insertBefore (document.getElementById(data).parentNode, ev.target.parentNode.previousSibling);
    }
</script>
<div class = "col-md-12">
    <div class = "page-header" >   
        <h2><?php echo $title; ?></h2>
    </div> 
        <div style="padding-bottom:20px; padding-top: 10px; padding-left:20px">
            <h3>Subir imagen</h3>
            <?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
                <td><?php echo $this->Form->file('image', ['id' => 'boton']); ?>
                    <?php echo $this->Form->submit('Aceptar'); ?>
                </td>
                <?php echo $this->Form->hidden('uploading'); ?>
            <?php echo $this->Form->end();?>
        </div>
            
        <table>
            <?php foreach ($images as $image): ?>
                <!--<div class="dropBox" ondrop="drop(event)" ondragover="allowDrop(event)"></div>-->
                <td class="imagen" draggable="true" ondragstart="drag(event)">
                    <img id="<?= $image->id?>" ondrop="drop(event)" ondragover="allowDrop(event)" width="200" height="200" src="<?php echo $initialPath.$image ['link_path'] ?>"></img>
                    <br />
                    <form method="post" onsubmit="return confirm ('¿Desea eliminar la imagen?');" action="/admin/home">
                        <input type="hidden" name="imagen"value="<?=$image ['id']?>"></input>
                        <?php echo $this->Form->hidden('removing'); ?>
                        <button  class="btn btn-block btn-danger" > Eliminar <div class="glyphicon glyphicon-remove">&#8194;</div></button>
                    </form>
                </td>
            <?php endforeach; ?>
        </table>
</div>
