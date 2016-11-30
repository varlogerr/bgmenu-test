<?php

namespace App\Bgmenu\Services\Order\StatusState;

class StatusStateNew extends AbstractStatusState {
    public function makeCancelled() {
        return new StatusStateCancelled();
    }

    public function makeProcessing() {
        return new StatusStateProcessing();
    }

    public function getName() {
        return 'new';
    }
}