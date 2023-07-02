<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Command;

/**
 * Классы Получателей содержат некую важную бизнес-логику. Они умеют выполнять
 * все виды операций, связанных с выполнением запроса. Фактически, любой класс
 * может выступать Получателем.
 */
class Receiver
{
    public function doSomething(string $a): void
    {
        echo "Receiver: Работает над (" . $a . ".)\n";
    }

    public function doSomethingElse(string $b): void
    {
        echo "Receiver: Так же работает над (" . $b . ".)\n";
    }
}
