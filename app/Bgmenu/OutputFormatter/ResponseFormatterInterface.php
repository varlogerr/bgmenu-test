<?php

namespace App\Bgmenu\OutputFormatter;


interface ResponseFormatterInterface {
    /**
     * @param string $data
     * @return string mixed
     */
    public function format($data);
}