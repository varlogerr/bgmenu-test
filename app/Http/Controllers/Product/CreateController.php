<?php

namespace App\Http\Controllers\Product;


class CreateController extends \App\Http\Controllers\Controller {
    private $productCreateService;
    private $createProductDtoOutConverter;

    public function __construct(
        \App\Bgmenu\Services\Product\CreateService $productCreateService,
        \App\Bgmenu\Dto\Product\CreateDtoOutConverter $createProductDtoOutConverter
    ) {
        $this->productCreateService = $productCreateService;
        $this->createProductDtoOutConverter = $createProductDtoOutConverter;
    }

    public function __invoke() {
        $product = $this->productCreateService->process(\Request::input());
        return $this->createProductDtoOutConverter->process($product);
    }
}