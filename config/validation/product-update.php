<?php

return [
    'name'           => 'max:255',
    'description'    => 'max:10000',
    'price'          => 'regex:/^\d{1,7}\.\d{2}$/',
    'amount'         => 'integer|min:0',
    'available_from' => 'date|date_format:Y-m-d|after:yesterday',
    'available_to'   => 'date|date_format:Y-m-d|after:available_from',
];
