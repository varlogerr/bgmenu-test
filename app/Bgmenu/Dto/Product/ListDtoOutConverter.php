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
            $productListDtoSingle->price = $product->price;

            $from = \DateTime::createFromFormat('Y-m-d', $product->available_from);
            $to = \DateTime::createFromFormat('Y-m-d', $product->available_to);
            $now = new \DateTime();

            $productListDtoSingle->is_available_now = $now >= $from && $now <= $to;

            $returnProducts[] = $productListDtoSingle;
        }

        return $returnProducts;
    }
}