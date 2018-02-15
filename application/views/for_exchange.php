<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row" id="figurinhas">
    <div class="col-md-12">
        <h2>FIGURINHAS REPETIDAS</h2>

        <form action="" method="POST">
            <div class="lista-de-figurinhas">
            <div class="row">
                <div class="col-md-12">
                    <?php if(!is_null($cards)){ $repeated_cards = explode(',',$cards->repeated_cards); } else {$repeated_cards=[];} ?>
                    <?php for($i=1; $i<641;$i++):?>
                        <?php $checked = (in_array($i,$repeated_cards))?" checked='checked'":""; ?>
                        <label class='wrapper-card'><input type='checkbox' name="repetidas[]" value="<?php echo $i;?>" <?php echo $checked; ?>>
                            <div class='card-background'>
                                <span class='checkmark'><?php echo $i; ?></span>
                            </div>
                        </label>
                    <?php endfor;?>
                </div>
            </div>
</div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-lg btn-success">TROCAR</button>
                </div>
            </div>
        </form>
    </div>
</div>
