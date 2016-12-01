<?php

namespace App\Bgmenu\OutputFormatter;

class JsonResponseFormatter implements ResponseFormatterInterface {
    /**
     * @inheritdoc
     */
    public function format($data, $code) {
        $decodedData = json_decode($data);

        $formatted = [
            'error' => null,
            'payload' => $decodedData,
        ];

        if ($code >= 400) {
            if (json_last_error() !== JSON_ERROR_NONE) {
                $decodedData = [
                    'code' => $code,
                    'data' => $data,
                ];
            }
            $formatted = [
                'error' => $decodedData,
                'payload' => null,
            ];
        }

        return json_encode($formatted);
    }
}