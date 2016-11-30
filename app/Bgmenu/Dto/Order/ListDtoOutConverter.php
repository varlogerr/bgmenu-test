<?php

namespace App\Bgmenu\Dto\Order;

class ListDtoOutConverter {
    private $orderSingleDtoPrototype;
    private $productSingleDtoPrototype;

    public function __construct(
        ListDtoOutSingle $orderSingleDto,
        ListDtoOutProduct $productSingleDto
    ) {
        $this->orderSingleDtoPrototype = $orderSingleDto;
        $this->productSingleDtoPrototype = $productSingleDto;
    }

    public function process(\Illuminate\Database\Eloquent\Collection $orders) {
        $returnDto = [];

        foreach ($orders as $order) {
            $orderDto = clone $this->orderSingleDtoPrototype;

            $orderDto->id = $order->id;
            $orderDto->status = $order->status;
            $orderDto->hash = $order->hash;
            $orderDto->created_at = (string) $order->created_at;
            $orderDto->products = [];
            $orderDto->price = 0;
            $orderDto->price_with_vat = 0;

            foreach ($order->orders as $product) {
                $productDto = clone $this->productSingleDtoPrototype;

                $productDto->id = $product->product->id;
                $productDto->quantity = $product->quantity;
                $productDto->amount = $product->product->amount;

                $productInfo = $product->product;
                if (in_array($orderDto->status, ['processing', 'completed'])) {
                    $productInfo = $product;
                }

                $productDto->description = $productInfo->description;
                $productDto->name = $productInfo->name;
                $productDto->price = \App\Bgmenu\Helpers\Price::createFromInt($productInfo->price * $productDto->quantity)->getStringValue();
                $productDto->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($productInfo->price_with_vat * $productDto->quantity)->getStringValue();

                $orderDto->price += $productDto->price;
                $orderDto->price_with_vat += $productDto->price_with_vat;

                $orderDto->products[] = $productDto;
            }

            $returnDto[] = $orderDto;
        }

        return $returnDto;
    }
}