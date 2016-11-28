<?php

namespace App\Bgmenu\Services\User;


class DeleteService {
    public function process($id) {
        $user = \App\User::find($id);
        if (! $user) {
            return null;
        }

        $user->delete();
        return $user;
    }
}