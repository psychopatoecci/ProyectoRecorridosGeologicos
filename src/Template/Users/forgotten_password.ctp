<?= $this->Html->css('information.css') ?> 
<style rel="stylesheet">
	.help-tip p {
		width: 380px;
		margin-right: 15px;
	}
</style>
<div class="help-tip">
    <p>Revise el correo de soporte.recorridosgeologicos@gmail.com<br />el cual tiene instrucciones para recuperar la cuenta.</p>
</div>
<div class="container-fluid">
    <div class="container" style=" padding:25px;">
        <?= $sentMessage ? '<h3>Se le envió un mensaje a su cuenta de correo.</h3>' : '' ?>
    </div>
</div>
