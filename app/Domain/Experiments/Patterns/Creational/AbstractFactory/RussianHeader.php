<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

class RussianHeader implements HeaderInterface
{
    public function getText(): string
    {
        return 'Русский заголовок';
    }
}
