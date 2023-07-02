<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Observer;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Subject implements SplSubject
{
    public int $state;
    private SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /**
     * @inheritDoc
     */
    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * @inheritDoc
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function someBusinessLogicWithSetNewState(int $newState): void
    {
        $this->state = $newState;
        $this->notify();
    }
}
