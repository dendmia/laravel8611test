<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\Builder;

class EnglishPhraseBuilder implements PhraseBuilderInterface
{
    private EnglishPhrase $phrase;

    public function __construct()
    {
        $this->reset();
    }

    public function produceHeader(): void
    {
        $this->phrase->addPart('Hi dear friend');
    }

    public function produceBody(): void
    {
        $this->phrase->addPart('text');
    }

    public function produceFooter(): void
    {
        $this->phrase->addPart('Best regards');
    }

    private function reset(): void
    {
        $this->phrase = new EnglishPhrase();
    }

    public function getProduct(): Phrase
    {
        $result = $this->phrase;
        $this->reset();
        return $result;
    }
}
