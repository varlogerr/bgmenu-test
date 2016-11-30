<?php

namespace App\Http\Controllers\Order;

class ListController extends \App\Http\Controllers\Controller {
    private $orderListDtoConverter;

    public function __construct(\App\Bgmenu\Dto\Order\ListDtoOutConverter $orderListDtoConverter) {
        $this->orderListDtoConverter = $orderListDtoConverter;
    }

    public function __invoke() {
        $orders = \Auth::user()->carts()->with('orders.product')->get();
//        $orders = \App\Cart::with('orders')->where('user_id', \Auth::user()->id)->get();
        return $this->orderListDtoConverter->process($orders);
    }
}