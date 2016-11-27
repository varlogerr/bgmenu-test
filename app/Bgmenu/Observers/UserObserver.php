<?php

namespace App\Bgmenu\Observers;

class UserObserver {
    public function saving(\App\User $user) {
        if ($user->password && \Hash::needsRehash($user->password)) {
            $user->password = \Hash::make($user->password);
        }
    }
}