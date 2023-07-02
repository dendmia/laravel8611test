<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Command;

class SimpleCommand implements CommandInterface
{

    private $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public function execute(): void
    {
        echo "SimpleCommand: Смотри, я могу делать простые вещи типа печати на экран (" . $this->payload . ")\n";
    }
}
