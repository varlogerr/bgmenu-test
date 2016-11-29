<?php

namespace App\Bgmenu\Services\Product;

class CreateService {
    /**
     * @var CreateValidator
     */
    private $createProductValidator;

    public function __construct(CreateValidator $createProductValidator) {
        $this->createProductValidator = $createProductValidator;
    }

    public function process($data) {
        $this->createProductValidator->process($data);

        if (isset($data['price'])) {
            $data['price'] = \App\Bgmenu\Helpers\Price::createFromString($data['price'])->getIntValue();
        }
        return \App\Product::create($data);
    }
}