<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\State;

class ConcreteStateB extends State
{
    public function handle1(): void
    {

    }

    public function handle2(): void
    {
        $this->context->transitionTo(new ConcreteStateA());
    }
}
