<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\FactoryMethodPolymorphic;

abstract class Creator
{
    /**
     * Обратите внимание, что Создатель может также обеспечить реализацию
     * фабричного метода по умолчанию.
     */
    abstract public function factoryMethod(): ProductInterface;

    /**
     * Также заметьте, что, несмотря на название, основная обязанность Создателя
     * не заключается в создании продуктов. Обычно он содержит некоторую базовую
     * бизнес-логику, которая основана на объектах Продуктов, возвращаемых
     * фабричным методом. Подклассы могут косвенно изменять эту бизнес-логику,
     * переопределяя фабричный метод и возвращая из него другой тип продукта.
     */
    public function someOperation(): string
    {
        // Вызываем фабричный метод, чтобы получить объект-продукт.
        $product = $this->factoryMethod();
        // Далее, работаем с этим продуктом.
        $result = "Creator: The same creator's code has just worked with " .
            $product->operation();

        return $result;
    }
}
