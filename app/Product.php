<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    private static $vat;

    protected $fillable = [
        'name', 'description', 'price', 'amount', 'available_from', 'available_to',
    ];

    protected $appends = ['is_available_now', 'price_with_vat'];

    public function getIsAvailableNowAttribute() {
        $now = new \Carbon\Carbon();
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $this->available_from);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $this->available_to);

        return $now->between($from, $to);
    }

    public function getPriceWithVatAttribute() {
        if (! static::$vat) {
            static::$vat = Setting::where('key', 'vat_percent')->first()->value;
        }

        return $this->price + ($this->price * static::$vat / 100);
    }
}
