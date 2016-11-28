<?php

namespace App\Bgmenu\Services\User;

class CreateService {
    private $userCreateValidator;

    public function __construct(CreateValidator $userCreateValidator) {
        $this->userCreateValidator = $userCreateValidator;
    }

    /**
     * @param array $data
     * @return \App\User
     */
    public function process(array $data) {
        $this->userCreateValidator->process($data);

        return \App\User::create($data);
    }
}