<?php

return [
    'cookie' => [
        'name' => env('CART_COOKIE_NAME', 'cart_cookie'),
        'expiration' => 14 * 24 * 60 //dos semanas
    ],
];