<?php

declare(strict_types=1);

namespace Experiments\Domain\Patterns;

use App\Domain\Experiments\Patterns\Behavioral\Observer\ConcreteObserverA;
use App\Domain\Experiments\Patterns\Behavioral\Observer\ConcreteObserverB;
use App\Domain\Experiments\Patterns\Behavioral\Observer\Subject;
use App\Domain\Experiments\Patterns\Behavioral\State\ConcreteStateA;
use App\Domain\Experiments\Patterns\Behavioral\State\ConcreteStateB;
use App\Domain\Experiments\Patterns\Behavioral\State\Context;
use Tests\TestCase;

class BehavioralPatternsTest extends TestCase
{
    public function testObserver(): void
    {
        $subject = new Subject();
        $o1 = new ConcreteObserverA();
        $subject->attach($o1);
        $this->assertEquals([], $o1->notifiedEvents);

        $o2 = new ConcreteObserverB();
        $subject->attach($o2);
        $this->assertEquals([], $o1->notifiedEvents);

        $subject->someBusinessLogicWithSetNewState(newState: 1);
        $subject->someBusinessLogicWithSetNewState(newState: 2);

        $subject->detach($o2);

        $subject->someBusinessLogicWithSetNewState(newState: 3);

        $this->assertEquals([1, 2, 3], $o1->notifiedEvents);
        $this->assertEquals([1, 2], $o2->subjectStates);
    }

    public function testState(): void
    {
        /**
         * Клиентский код.
         */
        $context = new Context(new ConcreteStateA());
        $this->assertInstanceOf(ConcreteStateA::class, $context->getState());

        $context->request1();
        $this->assertInstanceOf(ConcreteStateB::class, $context->getState());

        $context->request2();
        $this->assertInstanceOf(ConcreteStateA::class, $context->getState());

        $context->transitionTo(new ConcreteStateB());
        $this->assertInstanceOf(ConcreteStateB::class, $context->getState());

        $context->request1();
        $this->assertInstanceOf(ConcreteStateB::class, $context->getState());

        $context->request2();
        $this->assertInstanceOf(ConcreteStateA::class, $context->getState());
    }
}
