<?php

namespace App\Bgmenu\Services\User;

class UpdateValidator extends \App\Bgmenu\Services\AbstractValidator {
    public function getErrorMessage() {
        return 'Invalid input';
    }
}