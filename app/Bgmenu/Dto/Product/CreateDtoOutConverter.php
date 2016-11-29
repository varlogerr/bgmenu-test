<?php

namespace App\Bgmenu\Dto\Product;

class CreateDtoOutConverter {
    private $productCreateDtoPrototype;

    public function __construct(CreateDtoOut $productCreateDto) {
        $this->productCreateDtoPrototype = $productCreateDto;
    }

    public function process(\App\Product $product) {
        $productCreateDto = clone $this->productCreateDtoPrototype;

        $productCreateDto->id = $product->id;
        $productCreateDto->name = $product->name;
        $productCreateDto->slug = $product->slug;
        $productCreateDto->description = $product->description;
        $productCreateDto->price = \App\Bgmenu\Helpers\Price::createFromInt($product->price)->getStringValue();
        $productCreateDto->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($product->price_with_vat)->getStringValue();
        $productCreateDto->amount = $product->amount;
        $productCreateDto->available_from = $product->available_from;
        $productCreateDto->available_to = $product->available_to;
        $productCreateDto->is_available_now = $product->is_available_now;


        return (array) $productCreateDto;
    }
}