<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\Builder;

abstract class Phrase
{
    private array $parts = [];

    public function addPart(string $part): void
    {
        $this->parts[] = $part;
    }

    public function toString(): string
    {
        return implode(' ', $this->parts);
    }
}
