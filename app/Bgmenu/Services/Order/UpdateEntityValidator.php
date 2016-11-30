<?php

namespace App\Bgmenu\Services\Order;

class UpdateEntityValidator extends \App\Bgmenu\Services\AbstractValidator {

    public function process($cart) {
        $validator = \Validator::make([], []);
        if (($after = $this->getAfter($cart))) {
            $validator->after($after);
        }

        if ($validator->fails()) {
            throw new \App\Bgmenu\Exceptions\ValidationException($this->getErrorMessage(), $this->getErrorCode(), null, $validator->errors()->messages());
        }
    }

    public function getAfter($cart) {
        /* @var $cart \App\Cart */
        return function (\Illuminate\Validation\Validator $validator) use ($cart) {
            foreach ($cart->orders as $order) {
                if ($order->product->amount < $order->quantity) {
                    $validator->errors()->add('quantity', $order->quantity . ' of ' . $order->product->name . ' is not available in stock');
                }
            }
        };
    }

    public function getErrorMessage() {
        return 'Invalid state';
    }
}