<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php foreach($cards as $rc): ?>
<div class="row">
    <div class="col-md-12">
        <h2 class="title"><?php echo $rc->nomeCompleto ?></h2>
    </div>
</div>
<form action="" method="POST">
    <div class="row">
        <div class="col-md-12">
            <?php $cards = explode(',',$rc->repeated_cards); ?>
            <?php for($i=1; $i<641;$i++):?>
                <?php $checked = (in_array($i,$cards))?" checked='checked'":""; ?>
			    <label class='wrapper-card'><input type='checkbox' name="repetidas[]" value="<?php echo $i;?>" <?php echo $checked; ?>><div class='card-background'><span class='checkmark'><?php echo $i; ?></span></div></label>
            <?php endfor;?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-lg btn-success">TROCAR</button>
        </div>
    </div>
</form>
<?php endforeach; ?>