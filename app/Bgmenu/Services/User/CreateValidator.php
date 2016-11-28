<?php

namespace App\Bgmenu\Services\User;

class CreateValidator extends \App\Bgmenu\Services\AbstractValidator {
    public function getErrorMessage() {
        return 'Invalid input';
    }
}