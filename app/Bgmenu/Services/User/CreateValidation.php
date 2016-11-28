<?php

namespace App\Bgmenu\Services\User;

class CreateValidation {
    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function process($data) {
        $validator = \Validator::make($data, $this->config);

        if ($validator->fails()) {
            throw new \App\Bgmenu\Exceptions\ValidationException('Invalid input', 400, null, $validator->errors()->messages());
        }
    }
}