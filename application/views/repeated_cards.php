<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-12">
        <h2 class="title"><?php echo $user?></h2>
        <p><?php echo $departamento; ?> &bull; <?php echo $email; ?></p>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <?php echo $content?>
    </div>
    <div class="col-md-4">
        <?php foreach($myCards as $card): ?>
        <label class='wrapper-card'><input type='checkbox' checked='checked'><div class='card-background'><span class='checkmark'><?php echo $card;?></span></div></label>
        <?php endforeach;?>
    </div>
</div>