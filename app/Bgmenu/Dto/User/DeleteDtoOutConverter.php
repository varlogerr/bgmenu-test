<?php

namespace App\Bgmenu\Dto\User;


class DeleteDtoOutConverter {
    private $deleteDtoOutPrototype;

    public function __construct(DeleteDtoOut $deleteDtoOut) {
        $this->deleteDtoOutPrototype = $deleteDtoOut;
    }

    public function process(\App\User $user) {
        $deleteDtoOut = clone $this->deleteDtoOutPrototype;

        $deleteDtoOut->id = $user->id;
        $deleteDtoOut->name = $user->name;
        $deleteDtoOut->email = $user->email;

        return (array) $deleteDtoOut;
    }
}