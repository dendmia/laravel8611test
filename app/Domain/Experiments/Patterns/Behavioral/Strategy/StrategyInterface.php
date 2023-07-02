<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Strategy;

/**
 * Интерфейс Стратегии объявляет операции, общие для всех поддерживаемых версий
 * некоторого алгоритма.
 *
 * Контекст использует этот интерфейс для вызова алгоритма, определённого
 * Конкретными Стратегиями.
 */
interface StrategyInterface
{
    public function doAlgorithm(array $data): array;
}
