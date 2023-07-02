<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

class ConcreteObserverA implements SplObserver
{
    public array $notifiedEvents = [];

    public function update(SplSubject $subject): void
    {
        $this->notifiedEvents[] = $subject->state;
    }
}
