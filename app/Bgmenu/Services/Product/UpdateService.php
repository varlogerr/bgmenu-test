<?php

namespace App\Bgmenu\Services\Product;


class UpdateService {
    private $productUpdateValidator;

    public function __construct(UpdateValidator $productUpdateValidator) {
        $this->productUpdateValidator = $productUpdateValidator;
    }

    public function process($id, array $data) {
        /* @var $product \App\Product */
        $product = \App\Product::find($id);
        if (! $product) {
            return null;
        }

        $this->productUpdateValidator->process($data);

        if (isset($data['price'])) {
            $data['price'] = \App\Bgmenu\Helpers\Price::createFromString($data['price'])->getIntValue();
        }
        $product->update($data);
        return $product;
    }
}