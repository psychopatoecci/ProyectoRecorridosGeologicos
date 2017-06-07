<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="users form">
<?= $this->Flash->render('auth') ?>
    <style rel="stylesheet">
        .login {
            margin-top: 55px;
        }
    </style>
    <div class="container login">
    <?= $this->Form->create() ?>
        <legend><?= __('Escriba su usuario y contrase&ntilde;a') ?></legend>
        <?= $this->Form->control('username', ['label' => 'Nombre de usuario']) ?>
        <?= $this->Form->control('password', ['label' => 'Clave']) ?>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    </div>
</div>
