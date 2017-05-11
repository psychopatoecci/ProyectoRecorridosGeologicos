<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Map Point'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mapPoints index large-9 medium-8 columns content">
    <h3><?= __('Map Points') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sequence_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mapPoints as $mapPoint): ?>
            <tr>
                <td><?= $this->Number->format($mapPoint->path) ?></td>
                <td><?= $this->Number->format($mapPoint->sequence_number) ?></td>
                <td><?= $mapPoint->has('page') ? $this->Html->link($mapPoint->page->id, ['controller' => 'Pages', 'action' => 'view', $mapPoint->page->id]) : '' ?></td>
                <td><?= $this->Number->format($mapPoint->latitude) ?></td>
                <td><?= $this->Number->format($mapPoint->longitude) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mapPoint->path]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mapPoint->path]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mapPoint->path], ['confirm' => __('Are you sure you want to delete # {0}?', $mapPoint->path)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
