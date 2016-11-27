<?php

namespace App\Bgmenu\OutputFormatter;

class ResponseFormatterFactory {
    /**
     * @var array
     */
    private $config;

    public function __construct(array $config) {
        $this->config = $config;
    }

    /**
     * @param array $contentTypes
     * @return ResponseFormatterInterface
     * @throws \Exception
     */
    public function createForContentType($contentTypes) {
        $formatter = null;

        foreach ($contentTypes as $type) {
            if (array_key_exists($type, $this->config)) {
                return new $this->config[$type]();
            }
        }

        throw new \Exception('Formatter not provided');
    }
}