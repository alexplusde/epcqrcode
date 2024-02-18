<?php

class rex_api_epcqrcode extends rex_api_function
{
    protected $published = true;

    public function execute()
    {
        echo epcqrcode::factory(
            rex_request('iban', 'string', rex_config::get('epcqrcode', 'iban')),
            rex_request('bic', 'string', rex_config::get('epcqrcode', 'bic')),
            rex_request('name', 'string', rex_config::get('epcqrcode', 'name')),
            rex_request('description', 'string', rex_config::get('epcqrcode', 'description')),
            rex_request('amount', 'float', rex_config::get('amount', 'float')),
        )->outputImage('png');
        exit;
    }
}
