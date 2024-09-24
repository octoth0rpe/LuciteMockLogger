<?php

declare(strict_types=1);

namespace Lucite\MockLogger\Tests;

use Lucite\MockLogger\MockLogger;
use PHPUnit\Framework\TestCase;

class LogTest extends TestCase
{
    public function testCanLogEmergency(): void
    {
        $logger = new MockLogger();
        $logger->emergency('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[EMERGENCY] test', $logger->logs[0]);
    }

    public function testCanLogAlert(): void
    {
        $logger = new MockLogger();
        $logger->alert('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[ALERT] test', $logger->logs[0]);
    }

    public function testCanLogCritical(): void
    {
        $logger = new MockLogger();
        $logger->critical('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[CRITICAL] test', $logger->logs[0]);
    }

    public function testCanLogError(): void
    {
        $logger = new MockLogger();
        $logger->error('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[ERROR] test', $logger->logs[0]);
    }

    public function testCanLogWarning(): void
    {
        $logger = new MockLogger();
        $logger->warning('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[WARNING] test', $logger->logs[0]);
    }

    public function testCanLogDebug(): void
    {
        $logger = new MockLogger();
        $logger->debug('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[DEBUG] test', $logger->logs[0]);
    }

    public function testCanLogInfo(): void
    {
        $logger = new MockLogger();
        $logger->info('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[INFO] test', $logger->logs[0]);
    }

    public function testCanLogNotice(): void
    {
        $logger = new MockLogger();
        $logger->notice('test');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[NOTICE] test', $logger->logs[0]);
    }

    public function testCanLogWithLogFunc(): void
    {
        $logger = new MockLogger();
        $logger->log('info', 'test1');
        $logger->log('debug', 'test2');
        $this->assertEquals(2, $logger->count());
        $this->assertEquals('[INFO] test1', $logger->logs[0]);
        $this->assertEquals('[DEBUG] test2', $logger->logs[1]);
    }

    public function testCanClearLogBuffer(): void
    {
        $logger = new MockLogger();
        $logger->notice('test1');
        $logger->info('test2');
        $this->assertEquals(2, $logger->count());
        $logger->clear();
        $logger->alert('test3');
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[ALERT] test3', $logger->logs[0]);
    }

    public function testCanGetLastMessage(): void
    {
        $logger = new MockLogger();
        $logger->notice('test1');
        $logger->info('test2');
        $logger->alert('test3');
        $logger->critical('test4');
        $this->assertEquals(4, $logger->count());
        $this->assertEquals('[CRITICAL] test4', $logger->last());
    }


    public function testCanWriteContextAsJson(): void
    {
        $logger = new MockLogger();
        $logger->notice('handleJson', ['test' => 'value']);
        $this->assertEquals(1, $logger->count());
        $this->assertEquals('[NOTICE] handleJson {"test":"value"}', $logger->last());
    }
}
