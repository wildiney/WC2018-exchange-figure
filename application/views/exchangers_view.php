<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-md-12">
        <h2><i class="fas fa-exchange-alt gray"></i> QUEM QUER <span class="bigger">TROCAR</span></h2>

        <form action="">
            <div class="form-group">
                <select class="form-control" name="estados" id="estados">
                    <option value="" selected="selected">Selecione um estado</option>
                    <?php foreach ($states as $state): ?>
                        <option value="<?php echo $state->estado ?>"><?php echo $state->estado ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </form>
    </div>    
</div>
<?php
if ($exchangers):
    foreach ($exchangers as $exchange):
        ?>
        <?php
        $rcards = explode(',', $exchange->repeated_cards);
        $wcards = explode(',', $wanted_cards);
        $askfor = array_intersect($wcards, $rcards);
        ?>
        <div class="exchanger">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class=""><?php echo substr(remove_accents($exchange->nomeCompleto), 0, 15) ?>[...] - <?php echo $exchange->area ?><br>
                        <small><?php echo remove_accents($exchange->cidade); ?></small></h3>
                </div>
                <div class="col-sm-4 d-none d-sm-block">
                    <?php if (count($askfor) > 0): ?>
                        <p class="mb-0 mx-0 "><a class="btn btn-primary btn-trocar float-right" href="mailto:<?php echo $exchange->email ?>?subject=[TROCA DE FIGURINHAS]&body=Olá!%0D%0ATenho interesse nas suas figurinhas repetidas <?php echo implode($askfor, ", "); ?>.%0D%0AVamos trocar?">VAMOS TROCAR?</a></p>
        <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <?php foreach ($rcards as $card): ?>
            <?php $checked = (in_array($card, $wcards)) ? " mini-cards-wanted" : "" ?>
                        <div class="mini-cards <?php echo $checked; ?>">
                            <span class='checkmark'><?php echo $card; ?></span>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    <?php if (count($askfor) > 0): ?>
                        <p class="mb-0 mx-0 text-center d-block d-sm-none"><a class="btn btn-primary" href="mailto:<?php echo $exchange->email ?>?subject=[TROCA DE FIGURINHAS]&body=Olá!%0D%0ATenho interesse nas suas figurinhas repetidas <?php echo implode($askfor, ", "); ?>.%0D%0AVamos trocar?">VAMOS TROCAR?</a></p>
        <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
    endforeach;
else:
    ?>
    <div class="exchanger">
        <div class="row">
            <div class="col-lg-12">
                <h2>Ainda nao existem pessoas trocando figurinhas neste estado</h2>
            </div>
        </div>
    </div>
<?php
endif;
?>