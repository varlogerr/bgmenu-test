<?php

namespace App\Bgmenu\Observers;

class ProductObserver {
    public function creating(\App\Product $product) {
        // TODO make clear if slug should be mutable
        $product->slug = str_make_slug($product->name, '-');
    }
}