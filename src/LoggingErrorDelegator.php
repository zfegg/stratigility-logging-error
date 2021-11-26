<?php

declare(strict_types = 1);

namespace Zfegg\Stratigility\LoggingError;

use Laminas\Stratigility\Middleware\ErrorHandler;
use Psr\Container\ContainerInterface;

class LoggingErrorDelegator
{
    public function __invoke(
        ContainerInterface $container,
        string $serviceName,
        callable $callback
    ): ErrorHandler {
        $listener = $container->get(LoggingErrorListener::class);

        $errorHandler = $callback();
        $errorHandler->attachListener($listener);
        return $errorHandler;
    }
}
