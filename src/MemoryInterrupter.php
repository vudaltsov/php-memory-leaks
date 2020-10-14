<?php

declare(strict_types=1);

namespace App;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

final class MemoryInterrupter
{
    private int $maxBytes;

    private LoggerInterface $logger;

    public function __construct(int $maxBytes, ?LoggerInterface $logger = null)
    {
        if ($maxBytes <= 0) {
            throw new \InvalidArgumentException(sprintf('Parameter $maxBytes must be a positive integer, got %d.', $maxBytes));
        }

        $this->maxBytes = $maxBytes;
        $this->logger = $logger ?? new NullLogger();
    }

    public function __invoke(Worker $worker): void
    {
        $usedMemory = memory_get_usage(true);

        if ($usedMemory < $this->maxBytes) {
            return;
        }

        $worker->stop();

        $this->logger->warning(
            'Stopped worker after exceeding the memory limit of {limit} bytes ({memory} bytes allocated).',
            [
                'limit' => $this->maxBytes,
                'memory' => $usedMemory
            ],
        );
    }
}
