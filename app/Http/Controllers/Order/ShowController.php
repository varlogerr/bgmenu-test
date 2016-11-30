<?php

namespace App\Http\Controllers\Order;

class ShowController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $orderShowDtoConverter;

    public function __construct(\App\Bgmenu\Dto\Order\ShowDtoOutConverter $orderShowDtoConverter) {
        $this->orderShowDtoConverter = $orderShowDtoConverter;
    }

    public function __invoke($hash) {
        $cart = \Auth::user()->carts()->where('hash', $hash)->with('orders.product')->first();
        if (! $cart) {
            return $this->respondNotFound('Cart not found');
        }

        return $this->orderShowDtoConverter->process($cart);
    }
}