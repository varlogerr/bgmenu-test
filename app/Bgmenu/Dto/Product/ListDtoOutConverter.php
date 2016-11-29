<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ninja
 * Date: 2016-11-28
 * Time: 20:09
 */

namespace App\Bgmenu\Dto\Product;


class ListDtoOutConverter {
    private $productListDtoSinglePrototype;

    public function __construct(ListDtoOutSingle $productListDtoSingle) {
        $this->productListDtoSinglePrototype = $productListDtoSingle;
    }

    public function process(\Illuminate\Database\Eloquent\Collection $products) {
        $returnProducts = [];
        foreach ($products as $product) {
            $productListDtoSingle = clone $this->productListDtoSinglePrototype;

            $productListDtoSingle->id = $product->id;
            $productListDtoSingle->name = $product->name;
            $productListDtoSingle->slug = $product->slug;
            $productListDtoSingle->description = $product->description;
            $productListDtoSingle->price = \App\Bgmenu\Helpers\Price::createFromInt($product->price)->getStringValue();
            $productListDtoSingle->price_with_vat = \App\Bgmenu\Helpers\Price::createFromInt($product->price_with_vat)->getStringValue();
            $productListDtoSingle->is_available_now = $product->is_available_now;

            $returnProducts[] = $productListDtoSingle;
        }

        return $returnProducts;
    }
}