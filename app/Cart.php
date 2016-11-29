<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    protected $fillable = [
        'user_id', 'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}