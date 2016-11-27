<?php
/**
 * Created by IntelliJ IDEA.
 * User: Ninja
 * Date: 2016-11-27
 * Time: 22:55
 */

namespace App\Bgmenu\Dto\Authentication;


class LoginDtoOutConverter {
    /**
     * @var LoginDtoOut
     */
    private $loginDtoOutPrototype;

    public function __construct(LoginDtoOut $loginDtoOut) {
        $this->loginDtoOutPrototype = $loginDtoOut;
    }

    public function process(\App\User $user) {
        $loginDtoOut = clone $this->loginDtoOutPrototype;

        $loginDtoOut->email = $user->email;
        $loginDtoOut->name = $user->name;

        return (array) $loginDtoOut;
    }
}