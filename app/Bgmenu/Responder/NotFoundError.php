<?php

namespace App\Bgmenu\Responder;

trait NotFoundError {
    public function respondNotFound($message = 'Forbidden') {
        $code = 404;

        return \Response::json([
            'message' => $message,
            'code'    => $code,
        ], $code);
    }
}