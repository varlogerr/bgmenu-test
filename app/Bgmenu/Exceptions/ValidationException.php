<?php

namespace App\Bgmenu\Exceptions;

class ValidationException extends AppException {
    /**
     * @var array
     */
    private $info = [];

    public function __construct($message = '', $code = 0, \Exception $previous = null, array $info = []) {
        parent::__construct($message, $code, $previous);

        $this->info = $info;
    }

    /**
     * @return array
     */
    public function getInfo() {
        return $this->info;
    }
}