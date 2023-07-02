<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\Builder;

class RussianPhraseBuilder implements PhraseBuilderInterface
{
    private $phrase;

    public function __construct()
    {
        $this->reset();
    }

    public function produceHeader(): void
    {
        $this->phrase->parts[] = 'Привет дорогой друг';
    }

    public function produceBody(): void
    {
        $this->phrase->parts[] = 'текст';
    }

    public function produceFooter(): void
    {
        $this->phrase->parts[] = 'С уважением';
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
