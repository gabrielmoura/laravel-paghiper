<?php
return [
    // You can set the entity who gets subscribed here.
    'model' => Blx32\LaravelPagHiper\Transactions::class,
    'api_key' => env('PAGHIPER_KEY'),
    'token' => env('PAGHIPER_TOKEN'),
    'type_bank_slip' => 'boletoa4', //boletoCarne
    'days_due_date' => '3',
];