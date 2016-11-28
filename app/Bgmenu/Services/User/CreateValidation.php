<?php

namespace App\Bgmenu\Services\User;

class CreateValidation {
    public function process($data) {
        $validator = \Validator::make($data, [
            'email'    => 'required|unique:users,email|email|max:255',
            'name'     => 'required|max:255',
            'phone'    => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            throw new \App\Bgmenu\Exceptions\ValidationException('Invalid input', 400, null, $validator->errors()->messages());
        }

        return [];
    }
}