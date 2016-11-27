<?php

namespace App\Http\Controllers\User;

class ListController extends \App\Http\Controllers\Controller  {
    public function __invoke() {
        $users = \App\User::all();

        return $users;
    }
}