<?php


namespace Zfegg\Stratigility\LoggingError;

use Zend\Stratigility\Middleware\ErrorHandler;

class ConfigProvider
{

    public function __invoke()
    {
        return [
            'dependencies' => [
                'delegators' => [
                    ErrorHandler::class => [
                        LoggingErrorListenerFactory::class,
                    ],
                ],
            ],
        ];
    }
}
