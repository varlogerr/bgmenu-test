<?php

namespace App\Bgmenu\Dto\Order;

class CreateDtoConverter {
    private $orderCreateDtoOutPrototype;

    public function __construct(\App\Bgmenu\Dto\Order\CreateDtoOut $orderCreateDtoOut) {
        $this->orderCreateDtoOutPrototype = $orderCreateDtoOut;
    }

    public function process(\App\Order $order) {
        $orderCreateDtoOut = clone $this->orderCreateDtoOutPrototype;

        $cart = $order->cart;

        $orderCreateDtoOut->hash = $cart->hash;
        $orderCreateDtoOut->status = $cart->status;
        $orderCreateDtoOut->order['product'] = $order->product->name;
        $orderCreateDtoOut->order['quantity'] = $order->quantity;

        return (array) $orderCreateDtoOut;
    }
}