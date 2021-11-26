<?php

declare(strict_types = 1);

namespace Zfegg\Stratigility\LoggingError;

use Laminas\Stratigility\Middleware\ErrorHandler;

class ConfigProvider
{

    public function __invoke(): array
    {
        return [
            'dependencies' => [
                'factories' => [
                    LoggingErrorListener::class => LoggingErrorListenerFactory::class,
                ],
                'delegators' => [
                    ErrorHandler::class => [
                        LoggingErrorDelegator::class,
                    ],
                ],
            ],
        ];
    }
}
