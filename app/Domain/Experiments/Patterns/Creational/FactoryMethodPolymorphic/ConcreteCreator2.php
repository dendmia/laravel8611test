<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\FactoryMethodPolymorphic;

class ConcreteCreator2 extends Creator
{
    public function factoryMethod(): ProductInterface
    {
        return new ConcreteProduct2();
    }
}
