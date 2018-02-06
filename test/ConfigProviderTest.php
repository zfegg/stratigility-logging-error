<?php

namespace ZfeggTest\Stratigility\LoggingError;

use PHPUnit\Framework\TestCase;
use Zfegg\Stratigility\LoggingError\ConfigProvider;

class ConfigProviderTest extends TestCase
{

    public function testInvoke()
    {
        $config = new ConfigProvider();
        $this->assertArrayHasKey('dependencies', $config());
    }
}
