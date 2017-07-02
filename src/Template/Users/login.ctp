<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Html->css('information.css') ?> 
<div class="help-tip">
    <p>Solo para administradores<br />Escriba sus datos y presione Iniciar Sesi&oacute;n.</p>
</div>

<div class="users form">
<?= $this->Flash->render('auth') ?>
    <style rel="stylesheet">
        .login {
            padding-top: 55px;
        }
    </style>
    <div class="container login">
        <?= $this->Form->create() ?>
            <legend><?= __('Escriba su usuario y contrase&ntilde;a') ?></legend>
            <?= $this->Form->control('username', ['label' => 'Nombre de usuario']) ?>
            <?= $this->Form->control('password', ['label' => 'Clave']) ?>
            <?= $this->Form->button(__('Iniciar Sesión'), ['class' => 'btn btn-success']); ?>
        <?= $this->Form->end() ?>
        <br />
        <form action='/users/forgottenPassword' method='post'>
            <?= $this->Form->button(__('Olvidé mi contraseña')); ?>
        </form>
    </div>
</div>

<style >
   .error {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
} 
</style>