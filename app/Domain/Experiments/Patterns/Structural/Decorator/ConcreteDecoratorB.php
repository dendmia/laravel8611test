<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Structural\Decorator;

class ConcreteDecoratorB extends Decorator
{
    public function operation(): string
    {
        return "ConcreteDecoratorB(" . parent::operation() . ")";
    }
}
