<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'firebase' => [
        'api_key' => 'AIzaSyDarQfygeyezL5rID7x86OGUr0_QpCfJiU', // Only used for JS integration
        'auth_domain' => 'warehouse-stock-apps.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://warehouse-stock-apps-default-rtdb.firebaseio.com',
        'storage_bucket' => 'warehouse-stock-apps.appspot.com', // Only used for JS integration
    ],

];
