<?php

namespace App\Bgmenu\Services\User;

class CreateService {
    /**
     * @param array $data
     * @return \App\User
     */
    public function process(array $data) {
        return \App\User::create($data);
    }
}