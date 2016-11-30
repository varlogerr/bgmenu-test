<?php

namespace App\Bgmenu\Services\Order\StatusState;

interface IStatusState {
    public function makeNew();
    public function makeProcessing();
    public function makeCompleted();
    public function makeCancelled();
    /**
     * @param string $status
     * @return IStatusState
     */
    public function make($status);
    public function getName();
    public function process(\App\Cart $cart);
}