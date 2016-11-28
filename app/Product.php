<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = [
        'name', 'description', 'price', 'amount', 'available_from', 'available_to',
    ];
}
