<?php

namespace App\Bgmenu\Services\Product;


class DeleteService {
    public function process($id) {
        $product = \App\Product::find($id);
        if (! $product) {
            return null;
        }

        $product->delete();
        return $product;
    }
}