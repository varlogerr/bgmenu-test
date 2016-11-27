<?php
namespace App\Http\Controllers\Authentication;

class LoginController extends \App\Http\Controllers\Controller {
    public function __invoke() {
        $credentials = \Request::only(['email', 'password']);
        if (! \Auth::check() && \Auth::attempt($credentials)) {
            return ;
        }

        // TODO invent auth failed error
    }
}