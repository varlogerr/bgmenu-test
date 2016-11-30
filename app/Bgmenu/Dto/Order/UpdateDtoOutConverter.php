<?php

namespace App\Bgmenu\Dto\Order;

class UpdateDtoOutConverter {
    private $orderUpdateDtoOutPrototype;
    private $productUpdateDtoOutPrototype;

    public function __construct(
        UpdateDtoOut $orderUpdateDtoOut,
        UpdateDtoOutProduct $productUpdateDtoOut
    ) {
        $this->orderUpdateDtoOutPrototype = $orderUpdateDtoOut;
        $this->productUpdateDtoOutPrototype = $productUpdateDtoOut;
    }

    public function process(\App\Cart $cart) {
        $orderDtoOut = clone $this->orderUpdateDtoOutPrototype;

        $orderDtoOut->id = $cart->id;
        $orderDtoOut->hash = $cart->hash;
        $orderDtoOut->status = $cart->status;
        $orderDtoOut->created_at = (string) $cart->created_at;
        $orderDtoOut->price = 0;
        $orderDtoOut->price_with_vat = 0;
        $orderDtoOut->products = [];

        foreach ($cart->orders as $product) {
            $productDto = clone $this->productUpdateDtoOutPrototype;

            $productDto->id = $product->product->id;
            $productDto->quantity = $product->quantity;

            $productDto->description = $product->description;
            $productDto->name = $product->name;
            $productDto->price = \App\Bgmenu\Helpers\Price::createFromInt($product->price * $productDto->quantity)->getStringValue();
            $productDto->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($product->price_with_vat * $productDto->quantity)->getStringValue();

            $orderDtoOut->price += $productDto->price;
            $orderDtoOut->price_with_vat += $productDto->price_with_vat;

            $orderDtoOut->products[] = $productDto;
        }

        return (array) $orderDtoOut;
    }
}
