<?php

namespace App;

class Order extends \Illuminate\Database\Eloquent\Model {
    private static $vat;

    protected $fillable = [
        'product_id', 'cart_id', 'name', 'description', 'price', 'quantity',
    ];

    public function cart() {
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function getPriceWithVatAttribute() {
        if (! static::$vat) {
            static::$vat = Setting::where('key', 'vat_percent')->first()->value;
        }

        return $this->price + ($this->price * static::$vat / 100);
    }
}