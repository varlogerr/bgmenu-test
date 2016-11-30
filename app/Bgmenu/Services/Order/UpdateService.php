<?php

namespace App\Bgmenu\Services\Order;

class UpdateService {
    private $orderUpdateValidator;
    private $statusStateFactory;

    public function __construct(
        UpdateValidator $orderUpdateValidator,
        \App\Bgmenu\Services\Order\StatusState\StatusStateFactory $statusStateFactory
    ) {
        $this->orderUpdateValidator = $orderUpdateValidator;
        $this->statusStateFactory = $statusStateFactory;
    }

    public function process($hash, $data) {
        $this->orderUpdateValidator->process($data);

        /* @var $cart \App\Cart */
        $cart = \Auth::user()->carts()->where('hash', $hash)->with('orders.product')->first();
        if (! $cart) {
            return null;
        }

        $currentStatus = $this->statusStateFactory->makeByName($cart->status);
        $currentStatus->make($data['status'])->process($cart);

        return $cart;
    }
}