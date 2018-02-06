<?php


namespace Zfegg\Stratigility\LoggingError;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Zend\Stratigility\Middleware\ErrorHandler;

class LoggingErrorListenerFactory
{
    public function __invoke(
        ContainerInterface $container,
        $serviceName,
        callable $callback
    ) : ErrorHandler {
        $logger = $container->has(LoggerInterface::class) ?
            $container->get(LoggerInterface::class) :
            new NullLogger();

        $listener = new LoggingErrorListener($logger);

        $errorHandler = $callback();
        $errorHandler->attachListener($listener);
        return $errorHandler;
    }
}
