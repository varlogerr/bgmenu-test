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
        return \App\Product::create($data);
    }
}