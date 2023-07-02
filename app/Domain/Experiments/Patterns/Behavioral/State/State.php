<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\State;

abstract class State
{
    protected Context $context;

    public function setContext(Context $context): void
    {
        $this->context = $context;
    }

    abstract public function handle1(): void;

    abstract public function handle2(): void;
}
