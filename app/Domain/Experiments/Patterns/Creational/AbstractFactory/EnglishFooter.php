<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

class EnglishFooter implements FooterInterface
{
    public function getText(): string
    {
        return 'English Footer';
    }
}
