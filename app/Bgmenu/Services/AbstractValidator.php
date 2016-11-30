<?php

namespace App\Bgmenu\Services;


abstract class AbstractValidator {
    private $config;

    public function __construct(array $config = []) {
        $this->config = $config;
    }

    /**
     * Get after validation callback
     *
     * @return \Closure|null
     */
    public function getAfter($data) { return null; }

    public function process($data) {
        $validator = \Validator::make($data, $this->config);

        if (($after = $this->getAfter($data))) {
            $validator->after($after);
        }

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