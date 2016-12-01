<?php

namespace App\Bgmenu\Services\Order;

class CreateService {
    private $orderCreateValidator;

    public function __construct(CreateValidator $orderCreateValidator) {
        $this->orderCreateValidator = $orderCreateValidator;
    }

    public function process($data) {
        $this->orderCreateValidator->process($data);

        $product = \App\Product::find($data['product_id']);

        if (! $product->is_available_now) {
            $validator = \Validator::make([], []);
            $validator->errors()->add('product_id', 'This product is not available now');
            throw new \App\Bgmenu\Exceptions\ValidationException('Invalid input', 400, null, $validator->errors()->messages());
        }

        $currentUserId = \Auth::user()->id;
        /* @var $newCart \App\Cart */
        $newCart = \App\Cart::where([
            ['user_id', \Auth::user()->id],
            ['status', 'new'],
        ])->first();

        $order = null;
        if ($newCart) {
            /* @var $order \App\Order */
            $order = \App\Order::where([
                ['cart_id', $newCart->id],
                ['product_id', $data['product_id']],
            ])->first();
        } else {
            $newCart = new \App\Cart([
                'user_id' => $currentUserId,
                'status'  => 'new',
            ]);
        }

        if ($order) {
            $data['quantity'] = $order->quantity + $data['quantity'];
            $this->orderCreateValidator->process($data);
            $order->quantity = $data['quantity'];
        } else {
            $order = new \App\Order([
                'product_id' => $data['product_id'],
                'cart_id'    => $newCart->id,
                'quantity'   => $data['quantity'],
            ]);
        }

        \DB::transaction(function () use ($newCart, $order) {
            $newCart->save();
            $newCart->orders()->save($order);
        });

        return $order;
    }
}