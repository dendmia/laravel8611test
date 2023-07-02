<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Strategy;

/**
 * Конкретные Стратегии реализуют алгоритм, следуя базовому интерфейсу
 * Стратегии. Этот интерфейс делает их взаимозаменяемыми в Контексте.
 */
class ConcreteStrategyA implements StrategyInterface
{

    public function doAlgorithm(array $data): array
    {
        sort($data);

        return $data;
    }
}
