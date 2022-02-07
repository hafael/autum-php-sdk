<?php

return [

    'local' => [
        'api_key' => env('AUTUM_API_KEY'),
        'endpoints' => [
            'accounts' => 'https://accounts-local.autum.com.br',
            'wallet' => 'https://wallet-local.autum.com.br',
            'marketdata' => 'https://marketdata-local.autum.com.br',
        ]
    ],
    'development' => [
        'api_key' => env('AUTUM_API_KEY'),
        'endpoints' => [
            'accounts' => 'https://autum.com.br',
            'wallet' => 'https://wallet-testnet.autum.com.br',
            'marketdata' => 'https://marketdata.autum.com.br',
        ]
    ],
    'production' => [
        'api_key' => env('AUTUM_API_KEY'),
        'endpoints' => [
            'accounts' => 'https://autum.com.br',
            'wallet' => 'https://wallet.autum.com.br',
            'marketdata' => 'https://marketdata.autum.com.br',
        ]
    ]

];