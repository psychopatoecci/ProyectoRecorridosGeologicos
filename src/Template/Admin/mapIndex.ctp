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
            <h2>Isla Bolaños</h2>
       </div> 
        <div style="padding-bottom:20px; padding-top: 10px; padding-left:20px">
        <?= $this->Html->link('&#8194;<span class="glyphicon glyphicon-plus"></span> Agregar&#8194;', ['controller'=>'admin','action' => 'mapadd'],['class' => 'btn btn-success','escape' => false]) ?>
         </div>


        <div class = "table-responsive">
            <table class = "table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('Identificador') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('name',['Nombre del punto']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('latitide', ['Latitud']) ?></th>
                        <th scope="col"><?= $this->Paginator->sort('longitude',['Longitud']) ?></th>

                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mapPoints as $point): ?>
                        <tr>
                            <td><?= h($point->page_id) ?></td>
                            <td><?= h($point->name) ?></td>
                            <td><?= $this->Number->format($point->latitude) ?></td>
                            <td><?= $this->Number->format($point->longitude) ?></td>
                            <td>
                                <?= $this->Html->link('&#8201;&#8194;<span class="glyphicon glyphicon-pencil"></span> &#8201;Editar&#8194;', ['action' => 'edit', $point->page_id],['class' => 'btn btn-sm btn-primary','escape' => false]) ?>
                                <?= $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>&#8194;Eliminar', ['action' => 'delete', $point->page_id], ['confirm' => 'Eliminar usuario?','class' => 'btn btn-sm btn-danger','escape' => false]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                 </tbody>
             </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers(['before'=>'','after'=>'']) ?>
                <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            </ul>
        </div>
    </div>
</div>

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