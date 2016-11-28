<?php

namespace App\Bgmenu\Services\User;

class CreateValidation extends \App\Bgmenu\Services\AbstractValidator {
    public function getErrorCode() {
        return 400;
    }

    public function getErrorMessage() {
        return 'Invalid input';
    }
}