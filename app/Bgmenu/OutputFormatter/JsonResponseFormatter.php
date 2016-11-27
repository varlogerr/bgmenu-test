<?php

namespace App\Bgmenu\OutputFormatter;

class JsonResponseFormatter implements ResponseFormatterInterface {
    /**
     * @inheritdoc
     */
    public function format($data) {
        $data = json_decode($data);
        $formatted = [
            'error' => null,
            'payload' => $data,
        ];
        return json_encode($formatted);
    }
}