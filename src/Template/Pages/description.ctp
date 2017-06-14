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

$cakeDescription = 'Descripción de los Recorridos';
?>

<title>
    <?php echo $title; ?>
</title>

<?= $this->Html->css('description.css') ?> 
	<div class="tip-video">
		<div>
		<iframe class="video" src="<?php echo $url[0]->link_path;?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="help-tip2">
			<div class="help-tip">
				<p>En esta página usted encontrará información general acerca de ambos recorridos, así como datos necesarios si desea realizarlos.</p>
			</div>
		</div>
		<div class=main-div2>
			
			<p><?php echo $text[0]->description; ?></p><br>
			<div class="imagen">
				<img class="img" src="<?php echo $images[0]->link_path;?>" alt="Sugerencias de seguridad" height="340" width="300">
			</div>
			<div  class="lista">
				<ol id="lista2">
				<?php  
					$i = 0;
					foreach ($text as $textValue) {
						
						if($i != 0){
							echo '<li>'.$text[$i]->description.'</li>';
						}
						$i++;						
					}

				?>
				</ol>
				</div>
		</div>
	</div>

