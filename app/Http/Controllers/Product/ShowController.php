<?php

namespace App\Http\Controllers\Product;

class ShowController extends \App\Http\Controllers\Controller {
    use \App\Bgmenu\Responder\NotFoundError;

    private $productShowDtoOutConverter;

    public function __construct(\App\Bgmenu\Dto\Product\ShowDtoOutConverter $productShowDtoOutConverter) {
        $this->productShowDtoOutConverter = $productShowDtoOutConverter;
    }

    public function __invoke($id) {
        $product = \App\Product::where('id', $id)
            ->orWhere('slug', $id)->first();
        if (! $product) {
            return $this->respondNotFound('Product not found');
        }

        return $this->productShowDtoOutConverter->process($product);
    }
}