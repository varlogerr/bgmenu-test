<?php

namespace App\Bgmenu\Services\Order\StatusState;

class StatusStateFactory {
    private $map = [
        'new'        => StatusStateNew::class,
        'cancelled'  => StatusStateCancelled::class,
        'completed'  => StatusStateCompleted::class,
        'processing' => StatusStateProcessing::class,
    ];

    /**
     * @param string $name
     * @return IStatusState
     */
    public function makeByName($name) {
        return new $this->map[$name]();
    }
}