<?php

namespace App\Bgmenu\Helpers;

class Price {
    private $price;

    protected function __construct($intPrice) {
        $this->price = (int) $intPrice;
    }

    public static function createFromInt($intPrice) {
        return new static($intPrice);
    }

    public static function createFromFloat($floatPrice) {
        return static::createFromInt($floatPrice * 100);
    }

    public static function createFromString($stringPrice) {
        return static::createFromFloat((float) $stringPrice);
    }

    public function getIntValue() {
        return $this->price;
    }

    public function getFloatValue() {
        return round($this->getIntValue() / 100, 2);
    }

    public function getStringValue() {
        return sprintf('%01.2f', $this->getFloatValue());
    }
}