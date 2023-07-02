<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

class EnglishPageFactory implements PageFactoryInterface
{
    public function createHeader(): HeaderInterface
    {
        return (new EnglishHeader());
    }

    public function createFooter(): FooterInterface
    {
        return (new EnglishFooter());
    }
}
