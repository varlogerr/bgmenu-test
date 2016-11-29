<?php

namespace App\Http\Controllers\Order;

class CreateController extends \App\Http\Controllers\Controller {
    private $orderCreateService;

    public function __construct(\App\Bgmenu\Services\Order\CreateService $orderCreateService) {
        $this->orderCreateService = $orderCreateService;
    }

    public function __invoke() {
        $order = $this->orderCreateService->process(\Request::input());

        return $order->orders;
    }
}