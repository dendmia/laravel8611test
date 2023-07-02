<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\FactoryMethodPolymorphic;

interface ProductInterface
{
    public function operation(): string;
}
