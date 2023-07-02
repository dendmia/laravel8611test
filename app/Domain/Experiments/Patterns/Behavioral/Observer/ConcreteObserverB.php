<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

class ConcreteObserverB implements SplObserver
{
    public array $subjectStates = [];
    public function update(SplSubject $subject): void
    {
        $this->subjectStates[] = $subject->state;
    }
}
