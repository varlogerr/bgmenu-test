<?php

namespace App\Bgmenu\Services\Order\StatusState;

class StatusStateProcessing extends AbstractStatusState {
    public function makeCompleted() {
        return new StatusStateCompleted();
    }

    public function getName() {
        return 'processing';
    }

    public function process(\App\Cart $cart) {
        \DB::transaction(function () use ($cart) {
            $orderUpdateEntityValidator = new \App\Bgmenu\Services\Order\UpdateEntityValidator();
            $orderUpdateEntityValidator->process($cart);
            $cart->status = $this->getName();

            /* @var $order \App\Order */
            foreach ($cart->orders as $order) {
                $order->name = $order->product->name;
                $order->description = $order->product->description;
                $order->price = $order->product->price;
                $order->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($order->product->price_with_vat)->getIntValue();
                $order->product->amount -= $order->quantity;

                $order->save();
                $order->product->save();
            }

            $cart->save();
        });
    }
}