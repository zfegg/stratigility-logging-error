<?php

declare(strict_types = 1);

namespace Zfegg\Stratigility\LoggingError;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class LoggingErrorListenerFactory
{
    public function __invoke(ContainerInterface $container): LoggingErrorListener
    {
        $config = ($container->has('config') ? $container->get('config') : [])[LoggingErrorListener::class] ?? [];
        $logger = isset($config['logger'])
            ? $container->get($config['logger'])
            : ($container->has(LoggerInterface::class) ? $container->get(LoggerInterface::class) : new NullLogger());
        $message = $config['message'] ?? '%s "%s %s": <<<%s<<<';

        return new LoggingErrorListener($logger, $message);
    }
}
