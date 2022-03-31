<?php

$form = rex_config_form::factory($this->getProperty('package'));

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
$fragment->setVar('title', 'Standard-Parameter', false);
$fragment->setVar('body', $form->get(), false);
echo $fragment->parse('core/page/section.php');
