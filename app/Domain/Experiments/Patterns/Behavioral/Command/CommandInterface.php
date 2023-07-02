<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Command;

interface CommandInterface
{
    public function execute(): void;
}
