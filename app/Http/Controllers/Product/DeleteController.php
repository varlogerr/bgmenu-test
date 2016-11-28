<?php

namespace App\Http\Controllers\Product;

class DeleteController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $productDeleteService;
    private $productDeteleDtoConverter;

    public function __construct(
        \App\Bgmenu\Services\Product\DeleteService $productDeleteService,
        \App\Bgmenu\Dto\Product\DeleteDtoOutConverter $productDleteDtoConverter
    ) {
        $this->productDeleteService = $productDeleteService;
        $this->productDeteleDtoConverter = $productDleteDtoConverter;
    }

    public function __invoke($id) {
        $product = $this->productDeleteService->process($id);
        if (! $product) {
            return $this->respondNotFound('Product not found');
        }

        return $this->productDeteleDtoConverter->process($product);
    }
}