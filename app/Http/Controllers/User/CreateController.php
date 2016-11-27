<?php

namespace App\Http\Controllers\User;

class CreateController extends \App\Http\Controllers\Controller {
    public function __invoke() {
        return \Request::input();
    }
}