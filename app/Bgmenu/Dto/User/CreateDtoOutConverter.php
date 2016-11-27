<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ninja
 * Date: 2016-11-27
 * Time: 17:10
 */

namespace App\Bgmenu\Dto\User;


class CreateDtoOutConverter {
    /**
     * @var CreateDtoOut
     */
    private $dto;

    public function __construct(CreateDtoOut $dto) {
        $this->dto = $dto;
    }

    public function process(\App\User $user) {
        $returnDto = clone $this->dto;

        $returnDto->id = $user->id;
        $returnDto->email = $user->email;
        $returnDto->name = $user->name;
        $returnDto->phone = $user->phone;

        return (array) $returnDto;
    }
}