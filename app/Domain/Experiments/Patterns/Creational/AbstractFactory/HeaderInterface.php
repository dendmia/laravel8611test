<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

interface HeaderInterface
{
    public function getText(): string;
}
