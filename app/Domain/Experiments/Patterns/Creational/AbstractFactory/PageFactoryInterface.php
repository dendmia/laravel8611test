<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

// Абстрактная фабрика знает обо всех абстрактных типах продуктов.

interface PageFactoryInterface
{
    public function createHeader(): HeaderInterface;
    public function createFooter(): FooterInterface;
}
