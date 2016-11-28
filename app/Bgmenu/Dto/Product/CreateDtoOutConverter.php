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
        $productCreateDto->price = $product->price;
        $productCreateDto->amount = $product->amount;
        $productCreateDto->available_from = $product->available_from;
        $productCreateDto->available_to = $product->available_to;

        $now = new \Carbon\Carbon();
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $product->available_from);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $product->available_to);

        $productCreateDto->is_available_now = $now->between($from, $to, true);

        return (array) $productCreateDto;
    }
}