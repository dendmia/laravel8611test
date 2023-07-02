<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\State;

class Context
{
    /**
     * Cсылка на текущее состояние Контекста.
     */
    private State $state;

    public function __construct(State $state)
    {
        $this->transitionTo($state);
    }

    public function getState(): State
    {
        return $this->state;
    }

    /**
     * Контекст позволяет изменять объект Состояния во время выполнения.
     */
    public function transitionTo(State $state): void
    {
        $this->state = $state;
        $this->state->setContext($this);
    }

    /**
     * Контекст делегирует часть своего поведения текущему объекту Состояния.
     */
    public function request1(): void
    {
        $this->state->handle1();
    }

    public function request2(): void
    {
        $this->state->handle2();
    }
}
