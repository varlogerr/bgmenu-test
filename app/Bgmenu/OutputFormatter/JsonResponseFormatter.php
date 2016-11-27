<?php

namespace App\Bgmenu\OutputFormatter;

class JsonResponseFormatter implements ResponseFormatterInterface {
    /**
     * @inheritdoc
     */
    public function format($data, $code) {
        $data = json_decode($data);

        $formatted = [
            'error' => null,
            'payload' => $data,
        ];

        if ($code >= 400) {
            $formatted = [
                'error' => $data,
                'payload' => null,
            ];
        }

        return json_encode($formatted);
    }
}