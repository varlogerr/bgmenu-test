<?php

namespace App\Bgmenu\Services\Order;

class UpdateService {
    private $orderUpdateValidator;
    private $orderUpdateEntityValidator;
    private $allowedStatusMap = [
        'new' => ['cancelled', 'processing'],
        'processing' => ['completed'],
    ];

    public function __construct(
        UpdateValidator $orderUpdateValidator,
        UpdateEntityValidator $orderUpdateEntityValidator
    ) {
        $this->orderUpdateValidator = $orderUpdateValidator;
        $this->orderUpdateEntityValidator = $orderUpdateEntityValidator;
    }

    public function process($hash, $data) {
        $this->orderUpdateValidator->process($data);

        /* @var $cart \App\Cart */
        $cart = \Auth::user()->carts()->where('hash', $hash)->with('orders.product')->first();
        if (! $cart) {
            return null;
        }

        $newStatus = $data['status'];
        if ($cart->status === 'new' && in_array($newStatus, $this->allowedStatusMap[$cart->status])) {
            \DB::transaction(function () use ($newStatus, $cart) {
                $cart->status = $newStatus;
                $this->orderUpdateEntityValidator->process($cart);
                $cart->status = $newStatus;

                /* @var $order \App\Order */
                foreach ($cart->orders as $order) {
                    $order->name = $order->product->name;
                    $order->description = $order->product->description;
                    $order->price = $order->product->price;
                    if ($newStatus === 'processing') {
                        $order->product->amount -= $order->quantity;
                        $order->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($order->product->price_with_vat)->getIntValue();
                    }

                    $order->save();
                    $order->product->save();
                }

                $cart->save();
            });
        } elseif ($cart->status === 'processing' && in_array($newStatus, $this->allowedStatusMap[$cart->status])) {
            $cart->status = $newStatus;
            $cart->save();
        } else {
            $validator = \Validator::make([], []);
            $validator->errors()->add('status', 'Not allowed status');
            throw new \App\Bgmenu\Exceptions\ValidationException('Invalid input', 400, null, $validator->errors()->messages());
        }

        return $cart;
    }
}