<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

class RussianFooter implements FooterInterface
{
    public function getText(): string
    {
        return 'Русская подпись';
    }
}
