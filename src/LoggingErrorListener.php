<?php

namespace Zfegg\Stratigility\LoggingError;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

class LoggingErrorListener
{

    /**
     * Log message string with placeholders
     */
    private $message = '%s "%s %s": <<<%s<<<';

    private $logger;

    /**
     * Set log format
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(
        $error,
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $this->logger->error(
            sprintf(
                $this->message,
                $response->getStatusCode(),
                $request->getMethod(),
                (string)$request->getUri(),
                $error
            ),
            [
                'status' => $response->getStatusCode(),
                'method' => $request->getMethod(),
                'uri'    => (string)$request->getUri(),
                'error'  => $error,
            ]
        );
    }
}
