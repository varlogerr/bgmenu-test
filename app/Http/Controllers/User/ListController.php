<?php

namespace App\Http\Controllers\User;

class ListController extends \App\Http\Controllers\Controller  {
    public function __invoke() {
        return [
            [
                'name' => 'dummy',
                'age' => 20,
            ],
            [
                'name' => 'helloworld',
                'age' => 'immortal',
            ],
        ];
    }
}