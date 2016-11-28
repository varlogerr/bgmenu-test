<?php

namespace App\Bgmenu\Dto\Product;

class DeleteDtoOutConverter {
    private $productDeleteDtoPrototype;

    public function __construct(DeleteDtoOut $productDeleteDto) {
        $this->productDeleteDtoPrototype = $productDeleteDto;
    }

    public function process(\App\Product $product) {
        $productDeleteDto = clone $this->productDeleteDtoPrototype;

        $productDeleteDto->id = $product->id;
        $productDeleteDto->name = $product->name;

        return (array) $productDeleteDto;
    }
}