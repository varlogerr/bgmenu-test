<?php

namespace App\Bgmenu\Services\Order\StatusState;

abstract class AbstractStatusState implements IStatusState {
    private $map = [
        'new'        => 'makeNew',
        'processing' => 'makeProcessing',
        'completed'  => 'makeCompleted',
        'cancelled'  => 'makeCancelled',
    ];

    public function makeNew() {
        $this->throwException();
    }

    public function makeProcessing() {
        $this->throwException();
    }

    public function makeCompleted() {
        $this->throwException();
    }

    public function makeCancelled() {
        $this->throwException();
    }

    /**
     * @inheritdoc
     */
    public function make($status) {
        $method = $this->map[$status];
        return $this->$method();
    }

    public function process(\App\Cart $cart) {
        throw new \Exception('Not implemented');
    }

    private function throwException() {
        $validator = \Validator::make([], []);
        $validator->errors()->add('status', 'Not allowed status');
        throw new \App\Bgmenu\Exceptions\ValidationException('Invalid input', 400, null, $validator->errors()->messages());
    }
}