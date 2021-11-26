<?php

declare(strict_types = 1);

namespace ZfeggTest\Stratigility\LoggingError;

use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use Monolog\Handler\TestHandler;
use Monolog\Logger;
use Monolog\Processor\PsrLogMessageProcessor;
use PHPUnit\Framework\TestCase;
use Zfegg\Stratigility\LoggingError\LoggingErrorListener;

class LoggingErrorListenerTest extends TestCase
{
    public function testInvoke(): void
    {
        $testHandler = new TestHandler();
        $logger = new Logger('test', [$testHandler], [new PsrLogMessageProcessor()]);

        $listener = new LoggingErrorListener($logger, '%s "%s %s"');
        $listener(
            new \Exception('test'),
            (new ServerRequestFactory())->createServerRequest('GET', '/'),
            new Response()
        );

        $this->assertTrue($testHandler->hasError('200 "GET /"'));
    }
}
