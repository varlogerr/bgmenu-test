<?php

namespace App\Bgmenu\Services\Order;

class UpdateValidator extends \App\Bgmenu\Services\AbstractValidator {

    public function getAfter($data) {

    }

    public function getErrorMessage() {
        return 'Invali input';
    }
}