<?php

namespace App\Http\Controllers\Order;

class ListController extends \App\Http\Controllers\Controller {
    private $orderListDtoConverter;

    public function __construct(\App\Bgmenu\Dto\Order\ListDtoOutConverter $orderListDtoConverter) {
        $this->orderListDtoConverter = $orderListDtoConverter;
    }

    public function __invoke() {
        $orders = \Auth::user()->carts()->orderBy('id', 'desc')->with('orders.product')->get();
        return $this->orderListDtoConverter->process($orders);
    }
}