<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Structural\Decorator;

interface ComponentInterface
{
    public function operation(): string;
}
