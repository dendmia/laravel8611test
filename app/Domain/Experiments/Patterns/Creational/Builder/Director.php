<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\Builder;

class Director
{
    private PhraseBuilderInterface $builder;

    /**
     * Директор работает с любым экземпляром строителя, который передаётся ему
     * клиентским кодом. Таким образом, клиентский код может изменить конечный
     * тип вновь собираемого продукта.
     */
    public function __construct(PhraseBuilderInterface $builder)
    {
        $this->builder = $builder;
    }

    public function buildMinimalPhrase(): void
    {
        $this->builder->produceBody();
    }

    public function buildPhraseWithRespect(): void
    {
        $this->builder->produceHeader();
        $this->builder->produceBody();
        $this->builder->produceFooter();
    }
}
