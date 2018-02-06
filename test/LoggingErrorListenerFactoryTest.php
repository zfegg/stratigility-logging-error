<?php

namespace Zfegg\Stratigility\LoggingError;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Zend\Diactoros\Response;
use Zend\Stratigility\Middleware\ErrorHandler;

class LoggingErrorListenerFactoryTest extends TestCase
{

    public function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->method('has')->willReturn(false);

        $factory = new LoggingErrorListenerFactory();
        $result = $factory(
            $container,
            ErrorHandler::class,
            function () {
                return new ErrorHandler(new Response());
            }
        );

        $this->assertInstanceOf(ErrorHandler::class, $result);
    }
}
