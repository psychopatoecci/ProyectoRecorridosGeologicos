<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mapPoint->path],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mapPoint->path)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Map Points'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mapPoints form large-9 medium-8 columns content">
    <?= $this->Form->create($mapPoint) ?>
    <fieldset>
        <legend><?= __('Edit Map Point') ?></legend>
        <?php
            echo $this->Form->control('page_id', ['options' => $pages]);
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
