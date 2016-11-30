<?php

namespace App\Bgmenu\Services\Order\StatusState;

class StatusStateCompleted extends AbstractStatusState {
    public function getName() {
        return 'completed';
    }

    public function process(\App\Cart $cart) {
        $cart->status = $this->getName();
        $cart->save();
    }
}