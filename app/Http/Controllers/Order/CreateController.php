<?php

namespace App\Http\Controllers\Order;

class CreateController extends \App\Http\Controllers\Controller {
    private $orderCreateService;
    private $orderCreateDtoConverter;

    public function __construct(
        \App\Bgmenu\Services\Order\CreateService $orderCreateService,
        \App\Bgmenu\Dto\Order\CreateDtoConverter $orderCreateDtoConverter
    ) {
        $this->orderCreateService = $orderCreateService;
        $this->orderCreateDtoConverter = $orderCreateDtoConverter;
    }

    public function __invoke() {
        $order = $this->orderCreateService->process(\Request::input());

        return $this->orderCreateDtoConverter->process($order);
    }
}