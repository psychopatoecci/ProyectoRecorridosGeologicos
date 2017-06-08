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
<div class = "col-md-12">
    <div class = "page-header" >   
        <h2><?php echo $title; ?></h2>
    </div> 
        <div style="padding-bottom:20px; padding-top: 10px; padding-left:20px">
            <?= $this->Html->link('&#8194;<span class="glyphicon glyphicon-plus"></span> Agregar imagen&#8194;', ['controller'=>'admin','action' => 'addimage'],['class' => 'btn btn-success','escape' => false]) ?>
        </div>
        <?php foreach ($images as $image): ?>
                <img width="200" height="200" src="
                    <?php echo $image ['link_path'] ?>
                "></img>
                <?php /*
                    echo '<form method="post" onsubmit="return confirm (\'¿Desea eliminar la imagen?\');" action="/admin/home">
                    <button  class="btn btn-sm btn-danger" > <div class="glyphicon glyphicon-remove">&#8194;</div></button>
                    </form>'; */?>
        <?php endforeach; ?>
</div>
