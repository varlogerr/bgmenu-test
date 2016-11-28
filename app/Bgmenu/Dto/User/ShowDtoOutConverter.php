<?php

namespace App\Bgmenu\Dto\User;


class ShowDtoOutConverter {
    private $showUserDtoOutPrototype;

    public function __construct(ShowDtoOut $showUserDtoOut) {
        $this->showUserDtoOutPrototype = $showUserDtoOut;
    }

    public function process(\App\User $user) {
        $showUserDtoOut = clone $this->showUserDtoOutPrototype;

        $showUserDtoOut->id = $user->id;
        $showUserDtoOut->name = $user->name;
        $showUserDtoOut->email = $user->email;
        $showUserDtoOut->phone = $user->phone;
        $showUserDtoOut->created = (string) $user->created_at;

        return (array) $showUserDtoOut;
    }
}