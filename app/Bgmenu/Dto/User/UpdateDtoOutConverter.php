<?php

namespace App\Bgmenu\Dto\User;

class UpdateDtoOutConverter {
    private $userUpdateDtoPrototype;

    public function __construct(UpdateDtoOut $userUpdateDto) {
        $this->userUpdateDtoPrototype = $userUpdateDto;
    }

    public function process(\App\User $user) {
        $userUpdateDto = clone $this->userUpdateDtoPrototype;

        $userUpdateDto->id = $user->id;
        $userUpdateDto->email = $user->email;
        $userUpdateDto->name = $user->name;
        $userUpdateDto->phone = $user->phone;

        return (array) $userUpdateDto;
    }
}