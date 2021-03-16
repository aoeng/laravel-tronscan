<?php

return [
    'key'    => env('TRONSCAN_API_KEY', ''),
    'host'   => [
        'full'     => env('TRONSCAN_HOST_FULL', 'https://api.trongrid.io'),
        'solidity' => env('TRONSCAN_HOST_SOLIDITY', 'https://api.trongrid.io'),
        'event'    => env('TRONSCAN_HOST_EVENT', 'https://api.trongrid.io'),
        'sign'     => env('TRONSCAN_HOST_SIGN', 'https://api.trongrid.io'),
        'explorer' => env('TRONSCAN_HOST_EXPLORER', 'https://api.trongrid.io'),
    ],
    'wallet' => [
        'address'     => env('TRONSCAN_WALLET_ADDRESS', ''),
        'private_key' => env('TRONSCAN_WALLET_PRIVATE_KEY', ''),
        'free_limit'  => env('TRONSCAN_WALLET_FREE_LIMIT', 1000000)
    ]

];
