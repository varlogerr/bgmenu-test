<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = [
        'name', 'description', 'price', 'amount', 'available_from', 'available_to',
    ];

    protected $appends = ['is_available_now'];

    public function getIsAvailableNowAttribute() {
        $now = new \Carbon\Carbon();
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $this->available_from);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $this->available_to);

        return $now->between($from, $to);
    }
}
