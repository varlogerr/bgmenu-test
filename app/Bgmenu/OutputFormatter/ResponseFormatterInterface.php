<?php

namespace App\Bgmenu\OutputFormatter;


interface ResponseFormatterInterface {
    /**
     * @param string $data
     * @param int|string $code
     * @return string mixed
     */
    public function format($data, $code);
}