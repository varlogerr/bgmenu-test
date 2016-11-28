<?php

namespace App\Http\Controllers\Product;

class UpdateController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $productUpdateService;
    private $productUpdateDtoOutConverter;

    public function __construct(
        \App\Bgmenu\Services\Product\UpdateService $productUpdateService,
        \App\Bgmenu\Dto\Product\UpdateDtoOutConverter $productUpdateDtoOutConverter
    ) {
        $this->productUpdateService = $productUpdateService;
        $this->productUpdateDtoOutConverter = $productUpdateDtoOutConverter;
    }

    public function __invoke($id) {

        $product = $this->productUpdateService->process($id, \Request::input());
        if (! $product) {
            return $this->respondNotFound('Product not found');
        }

        return $this->productUpdateDtoOutConverter->process($product);
    }
}