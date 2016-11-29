<?php

return [
    'name'           => 'required|string|max:255',
    'description'    => 'required|string|max:10000',
    'price'          => 'required|regex:/^\d{1,7}\.\d{2}$/',
    'amount'         => 'required|integer|min:0',
    'available_from' => 'required|date|date_format:Y-m-d|after:yesterday',
    'available_to'   => 'required|date|date_format:Y-m-d|after:available_from',
];