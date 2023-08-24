<?php

return [
    'integration_id' => env('AMOCRM_API_CLIENT_ID'),
    'secret_key' => env('AMOCRM_API_CLIENT_SECRET'),
    'redirect_uri' => env('AMOCRM_API_REDIRECT_URI'),
    'subdomain' => env('AMOCRM_API_SUBDOMAIN'),
    'referer' => env('AMOCRM_API_REFERER'),
    'product_domain' => env('AMOCRM_API_PRODUCT_DOMAIN'),

    'api_uri' => 'api/v4/',

    'custom_fields' => [
        'customer_name' => 'CUSTOMER_NAME',
        'customer_phone_number' => 'CUSTOMER_PHONE_NUMBER',
        'customer_email' => 'CUSTOMER_EMAIL',
        'customer_flat_id' => 'FLAT_ID',
    ],
];
