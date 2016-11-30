<?php

namespace App\Bgmenu\Dto\Order;

class ListDtoOutSingle {
    public $id;
    public $hash;
    public $status;
    public $price = 0;
    public $price_with_vat = 0;
    public $created_at;
    /**
     * @var ListDtoOutProduct[]
     */
    public $products = [];
}