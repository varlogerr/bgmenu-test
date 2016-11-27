<?php

namespace App\Bgmenu\Responder;


trait ForbiddenError {
    public function respondForbidden($message = 'Forbidden') {
        $code = 403;

        return \Response::json([
            'message' => $message,
            'code'    => $code,
        ], $code);
    }
}