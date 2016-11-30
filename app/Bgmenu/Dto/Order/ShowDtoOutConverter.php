<?php

namespace App\Bgmenu\Dto\Order;

class ShowDtoOutConverter {
    private $orderShowDtoOutPrototype;
    private $productShowDtoOutPrototype;

    public function __construct(
        ShowDtoOut $orderShowDtoOut,
        ShowDtoOutProduct $productShowDtoOut
    ) {
        $this->orderShowDtoOutPrototype = $orderShowDtoOut;
        $this->productShowDtoOutPrototype = $productShowDtoOut;
    }

    public function process(\App\Cart $cart) {
        $orderDtoOut = clone $this->orderShowDtoOutPrototype;

        $orderDtoOut->id = $cart->id;
        $orderDtoOut->hash = $cart->hash;
        $orderDtoOut->status = $cart->status;
        $orderDtoOut->created_at = (string) $cart->created_at;
        $orderDtoOut->price = 0;
        $orderDtoOut->price_with_vat = 0;
        $orderDtoOut->products = [];

        foreach ($cart->orders as $product) {
            $productDto = clone $this->productShowDtoOutPrototype;

            $productDto->id = $product->product->id;
            $productDto->quantity = $product->quantity;
            $productDto->amount = $product->product->amount;

            $productInfo = $product->product;
            if (in_array($orderDtoOut->status, ['processing', 'completed'])) {
                $productInfo = $product;
            }

            $productDto->description = $productInfo->description;
            $productDto->name = $productInfo->name;
            $productDto->price = \App\Bgmenu\Helpers\Price::createFromInt($productInfo->price * $productDto->quantity)->getStringValue();
            $productDto->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($productInfo->price_with_vat * $productDto->quantity)->getStringValue();

            $orderDtoOut->price += $productDto->price;
            $orderDtoOut->price_with_vat += $productDto->price_with_vat;

            $orderDtoOut->products[] = $productDto;
        }

        return (array) $orderDtoOut;
    }
}