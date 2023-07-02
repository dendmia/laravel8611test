<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

class EnglishHeader implements HeaderInterface
{

    public function getText(): string
    {
        return 'English Header';
    }
}
