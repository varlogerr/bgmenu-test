<?php

namespace App\Http\Controllers\Order;

class UpdateController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $orderUpdateService;
    private $orderUpdateDtoOutConverter;

    public function __construct(
        \App\Bgmenu\Services\Order\UpdateService $orderUpdateService,
        \App\Bgmenu\Dto\Order\UpdateDtoOutConverter $orderUpdateDtoOutConverter
    ) {
        $this->orderUpdateService = $orderUpdateService;
        $this->orderUpdateDtoOutConverter = $orderUpdateDtoOutConverter;
    }

    public function __invoke($hash) {
        $cart = $this->orderUpdateService->process($hash, \Request::input());
        if (! $cart) {
            return $this->respondNotFound('Order not found');
        }

        return $this->orderUpdateDtoOutConverter->process($cart);
    }
}