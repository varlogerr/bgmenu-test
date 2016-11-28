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

        $from = \DateTime::createFromFormat('Y-m-d', $productCreateDto->available_from);
        $to = \DateTime::createFromFormat('Y-m-d', $productCreateDto->available_to);
        $now = new \DateTime();

        $productCreateDto->is_available_now = $now >= $from && $now <= $to;

        return (array) $productCreateDto;
    }
}