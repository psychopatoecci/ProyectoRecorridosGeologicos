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

<div class="row">
    <div class = "col-md-12">
       <div class = "page-header" >   
            <h2><?php echo $title; ?></h2>
       </div> 
        <div style="padding-bottom:20px; padding-top: 10px; padding-left:20px">
        <?= $this->Html->link('&#8194;<span class="glyphicon glyphicon-plus"></span> Agregar imagen&#8194;', ['controller'=>'admin','action' => 'addimage'],['class' => 'btn btn-success','escape' => false]) ?>
         </div>


        <div class = "table-responsive">
            <table class = "table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('Identificador') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('nombre',['Nombre imagen']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('imagen', ['Imagen']) ?></th>
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($images as $image): ?>
                        <tr>
                            <td>
                                <?= $this->Html->link('&#8201;&#8194;<span class="glyphicon glyphicon-pencil"></span> &#8201;Ver imagen&#8194;', ['action' => 'edit', $point->page_id],['class' => 'btn btn-sm btn-primary','escape' => false]) ?>
                                <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&#8194;Eliminar', ['action' => 'delete', $point->page_id], ['confirm' => 'Desea eliminar la imagen?','class' => 'btn btn-sm btn-danger','escape' => false]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                 </tbody>
             </table>
    </div>
</div>