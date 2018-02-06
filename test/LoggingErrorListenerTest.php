<?php

namespace ZfeggTest\Stratigility\LoggingError;

use Monolog\Handler\TestHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Zend\Diactoros\Request;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;
use Zfegg\Stratigility\LoggingError\LoggingErrorListener;

class LoggingErrorListenerTest extends TestCase
{
    public function testInvoke()
    {
        $testHandler = new TestHandler();
        $logger = new Logger('test', [$testHandler]);

        $listener = new LoggingErrorListener($logger);
        $listener->setMessage('%s %s %s');
        $listener(new \Exception('test'), new ServerRequest(), new Response());

        $this->assertTrue($testHandler->hasError('200 GET '));
    }
}
