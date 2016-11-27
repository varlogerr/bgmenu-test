<?php

namespace App\Http\Controllers\User;

class CreateController extends \App\Http\Controllers\Controller {
    private $createDtoOutConverter;

    public function __construct(\App\Bgmenu\Dto\User\CreateDtoOutConverter $createDtoOutConverter) {
        $this->createDtoOutConverter = $createDtoOutConverter;
    }

    public function __invoke() {
        $user = \App\User::create(\Request::input());
        return $this->createDtoOutConverter->process($user);
    }
}