<?php

namespace App\Bgmenu\Services\User;

class UpdateService {
    /**
     * @var UpdateValidator
     */
    private $userUpdateValidator;

    public function __construct(UpdateValidator $userUpdateValidator) {
        $this->userUpdateValidator = $userUpdateValidator;
    }

    public function process($id, array $data) {
        /* @var $user \App\User */
        $user = \App\User::find($id);
        if (! $user) {
            return null;
        }

        $this->userUpdateValidator->process($data);

        $data = array_filter($data, function ($value) {
            return $value !== null;
        });

        $user->update($data);

        return $user;
    }
}