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
        $updateProductDtoOut->price = $product->price;
        $updateProductDtoOut->amount = $product->amount;
        $updateProductDtoOut->available_from = $product->available_from;
        $updateProductDtoOut->available_to = $product->available_to;

        $now = new \Carbon\Carbon();
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $product->available_from);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $product->available_to);
        $updateProductDtoOut->is_available_now = $now->between($from, $to);

        return (array) $updateProductDtoOut;
    }
}