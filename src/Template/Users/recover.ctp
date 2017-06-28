<div class="users form">
    <div class="container login">
        <?= $this->Form->create() ?>
            <legend><?= __('Escriba la nueva contrase&ntilde;a') ?></legend>
            <?= $this->Form->input('Contraseña', ['type' => 'password']); ?>
            </input><button class="btn btn-primary"  type="submit" id="saveButton">Guardar</button>       
        <?= $this->Form->end() ?>
    </div>
</div>
