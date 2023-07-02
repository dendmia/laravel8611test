<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\FactoryMethodPolymorphic;

class ConcreteProduct2 implements ProductInterface
{
    public function operation(): string
    {
        return "{Result of the ConcreteProduct #2 }";
    }
}
