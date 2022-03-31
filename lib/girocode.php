<?php
class girocode extends Bezahlcode
{
    public static function factory($iban = null, $bic = null, $name = "", $description = "", $amount = 0, $type = "phpqrcode") {
        $bezahlcode = new girocode(rex_request('iban', 'string', $iban), rex_request('bic', 'string', $bic), rex_request('name', 'string', $name), $type, false);
        $bezahlcode->generatePayload(rex_request('description', 'string', $description), rex_request('amount', "float", $amount));

        return $bezahlcode;
    }

    public function showPng() {
        return '<img class="form-control" src="'.$this->generateBase64().'" alt="" />';
    }
}
