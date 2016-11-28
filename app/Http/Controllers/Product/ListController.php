<?php

namespace App\Http\Controllers\Product;

class ListController extends \App\Http\Controllers\Controller {
    private $productsListDtoConverter;

    public function __construct(\App\Bgmenu\Dto\Product\ListDtoOutConverter $productsListDtoConverter) {
        $this->productsListDtoConverter = $productsListDtoConverter;
    }

    public function __invoke() {
        $products = \App\Product::all();
        return $this->productsListDtoConverter->process($products);
    }
}