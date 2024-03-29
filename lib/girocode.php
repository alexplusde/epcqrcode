<?php

class epcqrcode extends Bezahlcode
{
    public static function factory($iban = '', $bic = '', $name = '', $description = '', $amount = 0, $type = 'phpqrcode')
    {
        $bezahlcode = new self($iban, $bic, $name, $type, false);
        $bezahlcode->generatePayload($description, $amount);

        return $bezahlcode;
    }

    public function showPng()
    {
        return '<img class="form-control" src="' . $this->generateBase64() . '" alt="" />';
    }
}
