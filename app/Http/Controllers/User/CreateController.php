<?php

namespace App\Http\Controllers\User;

class CreateController extends \App\Http\Controllers\Controller {
    public function __invoke() {
        $user = \App\User::create(\Request::input());

        return $user->toArray();
    }
}