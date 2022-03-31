<?php
class girocode extends Bezahlcode
{
    public static function factory($iban = null, $bic = null, $name = "", $description = "", $amount = 0, $type = "phpqrcode") {
        $bezahlcode new Bezahlcode(rex_get('iban', 'string', $iban), rex_get('bic', 'string', $bic), rex_get('name', 'string', $name), $type);
        $bezahlcode->generatePayload(rex_get('description', 'string', $description), rex_get('amount', float, $amount));

        return $bezahlcode;
    }
    
    public function showPng() {
        echo $this->outputImage('png');
        return $this;
    }
}
