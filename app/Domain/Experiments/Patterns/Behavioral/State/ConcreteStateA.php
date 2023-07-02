<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\State;

class ConcreteStateA extends State
{
    public function handle1(): void
    {
        $this->context->transitionTo(new ConcreteStateB());
    }

    public function handle2(): void
    {

    }
}
