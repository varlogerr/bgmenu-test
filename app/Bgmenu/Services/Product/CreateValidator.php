<?php

namespace App\Bgmenu\Services\Product;

class CreateValidator extends \App\Bgmenu\Services\AbstractValidator {
    public function getErrorMessage() {
        return 'Invalid input';
    }
}