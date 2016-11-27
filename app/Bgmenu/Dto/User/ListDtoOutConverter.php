<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ninja
 * Date: 2016-11-27
 * Time: 17:39
 */

namespace App\Bgmenu\Dto\User;


class ListDtoOutConverter {
    private $listDtoOutSingle;

    public function __construct(ListDtoOutSingle $listDtoOutSingle) {
        $this->listDtoOutSingle = $listDtoOutSingle;
    }

    public function process(\Illuminate\Database\Eloquent\Collection $users) {
        $usersDto = [];

        foreach ($users as $user) {
            $userDto = clone $this->listDtoOutSingle;

            $userDto->id = $user->id;
            $userDto->email = $user->email;
            $userDto->name = $user->name;
            $userDto->phone = $user->phone;

            $usersDto[] = $userDto;
        }

        return $usersDto;
    }
}