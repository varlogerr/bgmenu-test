<?php

namespace App;

class Setting extends \Illuminate\Database\Eloquent\Model {
    protected $fillable = [
        'key', 'value',
    ];
}