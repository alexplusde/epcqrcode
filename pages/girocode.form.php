<?php

echo rex_view::title(rex_i18n::msg('girocode'));

?>

<div class="row">
<div class="col col-md-8">

<?php
$form = rex_form::factory($this->getProperty('package'));

$field = $form->addInputField('text', 'name', null, ["class" => "form-control"]);
$field->setLabel('Empfänger');

$field = $form->addInputField('text', 'iban', null, ["class" => "form-control"]);
$field->setLabel('IBAN');


$field = $form->addInputField('text', 'bic', null, ["class" => "form-control"]);
$field->setLabel('BIC');

$field = $form->addInputField('text', 'description', null, ["class" => "form-control"]);
$field->setLabel('Verwendungszweck');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', 'QR-Code generieren', false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
?>
</div>
<div class="col col-md-4">
<?php
$fragment = new rex_fragment();
$fragment->setVar('class', 'info', false);
$fragment->setVar('title', 'QR-Code Vorschau', false);
$fragment->setVar('body', girocode::factory()->showPng(), false);
echo $fragment->parse('core/page/section.php');

?>
</div>
</div>
