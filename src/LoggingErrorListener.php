<?php

declare(strict_types = 1);

namespace Zfegg\Stratigility\LoggingError;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

final class LoggingErrorListener
{

    /**
     * Log message string with placeholders
     */
    private string $message;

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger, string $message = '%s "%s %s": <<<%s<<<')
    {
        $this->logger = $logger;
        $this->message = $message;
    }

    public function __invoke(
        \Throwable $error,
        ServerRequestInterface $request,
        ResponseInterface $response
    ): void {
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
