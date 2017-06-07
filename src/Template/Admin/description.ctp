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

<title>
    <?php echo $title; ?>
</title>

<?= $this->Html->css('description.css') ?> 
	<div class="tip-video">
		<div>
		<iframe width="100%" height="345" src="<?php echo $url[0]->link_path;?>" align="left"></iframe>	
		</div>
		<div class="help-tip2">
			<div class="help-tip">
				<p>En esta página usted encontrará información general acerca de ambos recorridos, así como datos necesarios si desea realizarlos.</p>
			</div>
		</div>
		<div class="form-group">
		  <label>URL:</label>
		  <input type="text" class="form-control" id="videoURL" name="videoURL" value="<?php echo $url[0]->link_path;?>">
		</div>		
		
		<div class="form-group">
		  <label>Título de sugerencias:</label>
		  <input type="text" class="form-control" id="tituloSugerencias" name="tituloSugerencias" value="<?php echo $text[0]->description; ?>">
		</div>
				
		<div class=main-div2>			
			<div  class="lista">
				<ol id="lista2">
				    <li><?php echo $text[1]->description; ?></li>
				    <li><?php echo $text[2]->description; ?></li>
				    <li><?php echo $text[3]->description; ?></li>
				    <li><?php echo $text[4]->description; ?></li>
				    <li><?php echo $text[5]->description; ?></li> 
				</ol>
				</div>
		</div>
	</div>
