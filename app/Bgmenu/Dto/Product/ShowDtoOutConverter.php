<?php

namespace App\Bgmenu\Dto\Product;

class ShowDtoOutConverter {
    private $productShowDtoPrototype;

    public function __construct(ShowDtoOut $productShowDtoOut) {
        $this->productShowDtoPrototype = $productShowDtoOut;
    }

    public function process(\App\Product $product) {
        $productShowDtoOut = clone $this->productShowDtoPrototype;

        $productShowDtoOut->id = $product->id;
        $productShowDtoOut->name = $product->name;
        $productShowDtoOut->slug = $product->slug;
        $productShowDtoOut->description = $product->description;
        $productShowDtoOut->price = $product->price;
        $productShowDtoOut->amount = $product->amount;
        $productShowDtoOut->available_from = $product->available_from;
        $productShowDtoOut->available_to = $product->available_to;
        $productShowDtoOut->created_at = (string) $product->created_at;

        $now = new \Carbon\Carbon();
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $product->available_from);
        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $product->available_to);
        $productShowDtoOut->is_available_now = $now->between($from, $to, true);

        return (array) $productShowDtoOut;
    }
}