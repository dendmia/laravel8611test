<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Structural\Decorator;

class ConcreteComponent implements ComponentInterface
{
    /**
     * Конкретные Компоненты предоставляют реализации поведения по умолчанию. Может
     * быть несколько вариаций этих классов.
     */
    public function operation(): string
    {
        return "ConcreteComponent";
    }
}
