<?php

namespace App\Bgmenu\Services;


abstract class AbstractValidator {
    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function process($data) {
        $validator = \Validator::make($data, $this->config);

        if ($validator->fails()) {
            throw new \App\Bgmenu\Exceptions\ValidationException($this->getErrorMessage(), $this->getErrorCode(), null, $validator->errors()->messages());
        }
    }

    /**
     * @return int
     */
    public function getErrorCode() {
        return 400;
    }

    /**
     * @return string
     */
    abstract public function getErrorMessage();
}