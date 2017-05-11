<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
</nav>
<div class="mapPoints view large-9 medium-8 columns content">
    <?php
        foreach ($mapPoint as $point){
            echo $point; 
        }
    ?>
</div>
