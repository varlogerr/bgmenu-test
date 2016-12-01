<?php

namespace App\Bgmenu\Observers;

class CartObserver {
    public function saved(\App\Cart $cart) {
        $dirties = $cart->getDirty();
        if (array_key_exists('status', $dirties)) {
            $this->sendEmail($cart);
        }
    }

    public function creating(\App\Cart $cart) {
        $cart->hash = \Ramsey\Uuid\Uuid::uuid4();
    }

    private function sendEmail(\App\Cart $cart) {
        $status = 'Created';
        switch ($cart->status) {
            case 'cancelled' :
                $status = 'Cancelled';
                break;
            case 'processing' :
                $status = 'Processing';
                break;
            case 'completed' :
                $status = 'Completed';
                break;
        }

        \Mail::raw("Order ${status}", function($message) use ($cart) {
            $message->from('fake1@bgmenu.com', 'Your hunger has changed!');
            $message->to('fake2@bgmenu.com')->cc('bar@example.com');
        });
    }
}