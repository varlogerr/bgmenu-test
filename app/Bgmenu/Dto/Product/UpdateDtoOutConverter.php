<?php

namespace App\Bgmenu\Dto\Product;

class UpdateDtoOutConverter {
    private $updateProductDtoOutPrototype;

    public function __construct(UpdateDtoOut $updateProductDtoOut) {
        $this->updateProductDtoOutPrototype = $updateProductDtoOut;
    }

    public function process(\App\Product $product) {
        $updateProductDtoOut = clone $this->updateProductDtoOutPrototype;

        $updateProductDtoOut->id = $product->id;
        $updateProductDtoOut->name = $product->name;
        $updateProductDtoOut->slug = $product->slug;
        $updateProductDtoOut->description = $product->description;
        $updateProductDtoOut->price = \App\Bgmenu\Helpers\Price::createFromInt($product->price)->getStringValue();
        $updateProductDtoOut->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($product->price_with_vat)->getStringValue();
        $updateProductDtoOut->amount = $product->amount;
        $updateProductDtoOut->available_from = $product->available_from;
        $updateProductDtoOut->available_to = $product->available_to;
        $updateProductDtoOut->is_available_now = $product->is_available_now;

        return (array) $updateProductDtoOut;
    }
}