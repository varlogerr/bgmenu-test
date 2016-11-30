<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ninja
 * Date: 2016-11-30
 * Time: 20:09
 */

namespace App\Bgmenu\Services\Order\StatusState;


class StatusStateCancelled extends AbstractStatusState {
    public function getName() {
        return 'cancelled';
    }

    public function process(\App\Cart $cart) {
        $cart->status = $this->getName();

        \DB::transaction(function () use ($cart) {
            /* @var $order \App\Order */
            foreach ($cart->orders as $order) {
                $order->name = $order->product->name;
                $order->description = $order->product->description;
                $order->price = $order->product->price;
                $order->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($order->product->price_with_vat)->getIntValue();

                $order->save();
            }

            $cart->save();
        });
    }
}