<?php

declare(strict_types = 1);

namespace ZfeggTest\Stratigility\LoggingError;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Zfegg\Stratigility\LoggingError\LoggingErrorListener;
use Zfegg\Stratigility\LoggingError\LoggingErrorListenerFactory;

class LoggingErrorListenerFactoryTest extends TestCase
{

    public function testInvoke(): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->method('has')->willReturn(false);

        $factory = new LoggingErrorListenerFactory();
        $result = $factory($container);

        $this->assertInstanceOf(LoggingErrorListener::class, $result);
    }
}
