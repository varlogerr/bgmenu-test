<?php

return [
    'product_id' => 'required|exists:products,id',
    'quantity'   => 'required|integer',
];