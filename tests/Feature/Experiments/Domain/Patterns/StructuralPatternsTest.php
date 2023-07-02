<?php

declare(strict_types=1);

namespace Experiments\Domain\Patterns;

use App\Domain\Experiments\Patterns\Structural\Adapter\Adaptee;
use App\Domain\Experiments\Patterns\Structural\Adapter\Adapter;
use App\Domain\Experiments\Patterns\Structural\Adapter\Target;
use App\Domain\Experiments\Patterns\Structural\Decorator\ComponentInterface;
use App\Domain\Experiments\Patterns\Structural\Decorator\ConcreteComponent;
use App\Domain\Experiments\Patterns\Structural\Decorator\ConcreteDecoratorA;
use App\Domain\Experiments\Patterns\Structural\Decorator\ConcreteDecoratorB;
use Tests\TestCase;

class StructuralPatternsTest extends TestCase
{
    public function testAdapter(): void
    {
        $target = new Target();
        $this->assertEquals("Target: The default target's behavior.", $target->request());

        $adaptee = new Adaptee();

        //"Client: The Adaptee class has a weird interface. See, I don't understand it"
        $this->assertEquals(".eetpadA eht fo roivaheb laicepS", $adaptee->specificRequest());

        //"Client: But I can work with it via the Adapter"
        $adapter = new Adapter($adaptee);
        $this->assertEquals('Adapter: (TRANSLATED) Special behavior of the Adaptee.', $adapter->request());
    }

    public function testDecorator(): void
    {
        $clientCode = function (ComponentInterface $component): string
        {
            return "RESULT: " . $component->operation();
        };

        /**
         * Таким образом, клиентский код может поддерживать как простые компоненты...
         */
        $simple = new ConcreteComponent();
        $simpleResult = $clientCode($simple);

        $this->assertEquals(
            expected: 'RESULT: ConcreteComponent',
            actual: $simpleResult,
            message: "Client: I've got a simple component: $simpleResult"
        );

        /**
         * ...так и декорированные.
         *
         * Обратите внимание, что декораторы могут обёртывать не только простые
         * компоненты, но и другие декораторы.
         */
        $decorator1 = new ConcreteDecoratorA($simple);
        $decorator2 = new ConcreteDecoratorB($decorator1);

        $clientCode($decorator2);

        $this->assertEquals(
            expected: 'RESULT: ConcreteDecoratorB(ConcreteDecoratorA(ConcreteComponent))',
            actual: $clientCode($decorator2),
            message: "Client: Now I've got a decorated component: " . $clientCode($decorator2)
        );
    }
}
