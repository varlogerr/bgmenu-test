<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ninja
 * Date: 2016-11-30
 * Time: 11:10
 */

namespace App\Bgmenu\Dto\Order;


class ShowDtoOut {
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