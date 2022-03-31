<?php

class rex_api_girocode extends rex_api_function
{
    protected $published = true;

    function execute()
    {
 
        echo girocode::factory(
            rex_request('iban', 'string', rex_config::get('girocode', 'iban')), 
            rex_request('bic', 'string', rex_config::get('girocode', 'bic')), 
            rex_request('name', 'string', rex_config::get('girocode', 'name')), 
            rex_request('description', 'string', rex_config::get('girocode', 'description')), 
            rex_request('amount', 'float', rex_config::get('amount', 'float'))
            )->outputImage('png');
        exit;

    }
}
?>
