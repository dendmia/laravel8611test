<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\Builder;

interface PhraseBuilderInterface
{
    public function produceHeader(): void;
    public function produceBody(): void;
    public function produceFooter(): void;
    public function getProduct(): Phrase;
}
