<?php

namespace App;

class Order extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        'product_id', 'cart_id', 'name', 'description', 'price', 'quantity',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}