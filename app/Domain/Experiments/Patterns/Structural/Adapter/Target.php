<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Structural\Adapter;

class Target
{
    /**
     * Целевой класс объявляет интерфейс, с которым может работать клиентский код.
     */
    public function request(): string
    {
        return "Target: The default target's behavior.";
    }
}
