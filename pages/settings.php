<?php

$form = rex_config_form::factory($this->getProperty('package'));

$field = $form->addInputField('text', 'name', null, ['class' => 'form-control']);
$field->setLabel('Empfänger');

$field = $form->addInputField('text', 'iban', null, ['class' => 'form-control']);
$field->setLabel('IBAN');

$field = $form->addInputField('text', 'bic', null, ['class' => 'form-control']);
$field->setLabel('BIC');

$field = $form->addInputField('text', 'description', null, ['class' => 'form-control']);
$field->setLabel('Verwendungszweck');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', 'Standard-Parameter', false);
$fragment->setVar('body', $form->get(), false);
?>

<div class="row">
    <div class="col-lg-8">
        <?= $fragment->parse('core/page/section.php') ?>
    </div>
    <div class="col-lg-4">
        <?php

$anchor = '<a target="_blank" href="https://donate.alexplus.de/?addon=epcqrcode"><img src="'.rex_url::addonAssets('epcqrcode', 'jetzt-beauftragen.svg').'" style="width: 100% max-width: 400px;"></a>';

$fragment = new rex_fragment();
$fragment->setVar('class', 'info', false);
$fragment->setVar('title', $this->i18n('epcqrcode_donate'), false);
$fragment->setVar('body', '<p>' . $this->i18n('epcqrcode_info_donate') . '</p>' . $anchor, false);
echo !rex_config::get('alexplusde', 'donated') ? $fragment->parse('core/page/section.php') : '';
?>
    </div>
</div>
