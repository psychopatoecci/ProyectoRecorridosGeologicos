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
	.boton {
		margin-left: 6px;
	}
</style>
<script>
    var lastSeq = 0;
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        var parentNode = ev.target.parentNode;
        if (parentNode.previousElementSibling == null){
            parentNode.parentNode.insertBefore (document.getElementById(data).parentNode, parentNode);
        } else {
            parentNode.parentNode.insertBefore (document.getElementById(data).parentNode, parentNode.previousSibling);
        }
        sequencesInPage = [];
        var table = document.getElementById('imagesTable');
        var sequences = '';
        for (var i = 0, row; row = table.rows[i]; i++) {
            for (var j = 0, col; col = row.cells[j]; j++) {
                var image = col.children [0];
                sequences += image.id + ',';
            }
        }
        sequences = sequences.substring (0, sequences.length - 1);
        document.getElementById('reorderButton').innerHTML = '<form method="post" action="/admin/home"><input type="hidden"  name="reorder" value="' + sequences + '"></input><input type="submit" class="btn btn-primary boton" value="Reordenar"></input></form>';
    }
</script>
<div class = "col-md-12">
    <div class = "page-header" >   
        <h2><?php echo $title; ?></h2>
    </div> 
	</div>
	<div style="margin-left:15px">
        <div style="padding-bottom:20px; padding-top: 10px; padding-left:20px">
            <h3>Subir imagen</h3>
            <?php echo $this->Form->create('subir_datos', ['type' => 'file']); ?>
                <td><?php echo $this->Form->file('image', ['id' => 'boton']); ?>
					<br /><button class="btn btn-primary"  type="submit" >Guardar</button>       
                </td>
                <?php echo $this->Form->hidden('uploading'); ?>
            <?php echo $this->Form->end();?>
        </div>
            
        <h3>Arrastre im&aacute;genes para reacomodarlas detr&aacute;s de otras</h3>
        <table id="imagesTable">
            <?php foreach ($images as $image): ?>
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
        <div id="reorderButton">
        </div>
        <div style="margin-bottom:30px;">
			<h3>Cambiar mensaje de inicio</h3>
            <?= $this->Form->create ('subir-mensaje') ?>
            <?= $this->Form->text ('message', ['value' => $text['description']]) ?>
            <input type="hidden"  name="id" value='<?= $text['id'] ?>'></input>
            <br /><button class="btn btn-primary"  type="submit" >Guardar</button>       
            <?= $this->Form->end () ?>
        </div>
	</div>
