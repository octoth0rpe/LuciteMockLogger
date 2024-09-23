<?php

declare(strict_types=1);

namespace Lucite\MockLogger;

use Psr\Log\LoggerInterface;
use Stringable;

class MockLogger implements LoggerInterface
{
    public array $logs = [];

    public function log($level, Stringable|string $msg, array $context = []): void
    {
        $msg = '['.strtoupper($level).'] '.$msg;
        $msg .= (count($context) === 0) ? '' : json_encode($context);
        $this->logs[] = $msg;
    }

    public function clear(): MockLogger
    {
        $this->logs = [];
        return $this;
    }

    public function count(): int
    {
        return count($this->logs);
    }

    public function emergency(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }

    public function alert(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }

    public function critical(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }

    public function error(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }

    public function warning(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }

    public function debug(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }

    public function info(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }

    public function notice(Stringable|string $msg, array $context = []): void
    {
        $this->log(__FUNCTION__, $msg, $context);
    }
}
