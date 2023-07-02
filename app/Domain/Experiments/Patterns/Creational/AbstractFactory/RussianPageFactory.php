<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\AbstractFactory;

class RussianPageFactory implements PageFactoryInterface
{
    public function createHeader(): HeaderInterface
    {
        return (new RussianHeader());
    }

    public function createFooter(): FooterInterface
    {
        return (new RussianFooter());
    }
}
