<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Structural\Decorator;

class ConcreteDecoratorA extends Decorator
{
    /**
     * Декораторы могут вызывать родительскую реализацию операции, вместо того,
     * чтобы вызвать обёрнутый объект напрямую. Такой подход упрощает расширение
     * классов декораторов.
     */
    public function operation(): string
    {
        return "ConcreteDecoratorA(" . parent::operation() . ")";
    }
}
