<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-12">
        <form action="">
            <div class="form-group">
                <select class="form-control" name="estados" id="estados">
                    <option value="" selected="selected">Selecione um estado</option>
                    <?php foreach($states as $state): ?>
                    <option value="<?php echo $state->estado ?>"><?php echo $state->estado ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </form>
    </div>    
</div>
<?php
if($exchangers):
foreach($exchangers as $exchange): ?>
<div class="exchanger">
<div class="row">
    <div class="col-lg-12">
        <h2><?php echo $exchange->nomeCompleto ?> - <?php echo $exchange->area ?> - <?php echo $exchange->cidade ?></h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?php 
            $rcards = explode(',',$exchange->repeated_cards);
            $wcards = explode(',',$wanted_cards);
            ?>
        <?php foreach($rcards as $card): ?>
        <?php $checked = (in_array($card,$wcards))?" mini-cards-wanted":"" ?>
            <div class="mini-cards <?php echo $checked; ?>">
                <span class='checkmark'><?php echo $card;?></span>
            </div>
        <?php endforeach;?>
    </div>
</div>
</div>
<?php endforeach; 
else:
?>
<div class="exchanger">
<div class="row">
    <div class="col-lg-12">
        <h2>Ainda não existem pessoas trocando figurinhas neste estado</h2>
    </div>
</div>
</div>
<?php
endif;
?>