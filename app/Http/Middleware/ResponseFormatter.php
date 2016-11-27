<?php

namespace App\Http\Middleware;

class ResponseFormatter {
    /**
     * @var \App\Bgmenu\OutputFormatter\ResponseFormatterFactory
     */
    private $responseFormatterFactory;

    public function __construct(\App\Bgmenu\OutputFormatter\ResponseFormatterFactory $responseFormatterFactory) {
        $this->responseFormatterFactory = $responseFormatterFactory;
    }

    public function handle(\Illuminate\Http\Request $request, \Closure $next) {
        /* @var $response \Illuminate\Http\Response */
        $response = $next($request);
        $responseContent = $response->getContent();
        $requestAcceptableContentTypes = $request->getAcceptableContentTypes();

        $formatter = $this->responseFormatterFactory->createForContentType($requestAcceptableContentTypes);
        $responseContent = $formatter->format($responseContent);

        $response->setContent($responseContent);

        return $response;
    }
}