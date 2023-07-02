<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Structural\Decorator;

/**
 * Базовый класс Декоратора следует тому же интерфейсу, что и другие компоненты.
 * Основная цель этого класса - определить интерфейс обёртки для всех конкретных
 * декораторов. Реализация кода обёртки по умолчанию может включать в себя поле
 * для хранения завёрнутого компонента и средства его инициализации.
 */
class Decorator implements ComponentInterface
{
    protected ComponentInterface $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }

    /**
     * Декоратор делегирует всю работу обёрнутому компоненту.
     */
    public function operation(): string
    {
        return $this->component->operation();
    }
}
