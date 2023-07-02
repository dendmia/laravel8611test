<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Command;

class ComplexCommand implements CommandInterface
{
    private Receiver $receiver;

    /**
     * Данные о контексте, необходимые для запуска методов получателя.
     */
    private string $a;

    private string $b;

    /**
     * Сложные команды могут принимать один или несколько объектов-получателей
     * вместе с любыми данными о контексте через конструктор.
     */
    public function __construct(Receiver $receiver, string $a, string $b)
    {
        $this->receiver = $receiver;
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * Команды могут делегировать выполнение любым методам получателя.
     */
    public function execute(): void
    {
        echo "ComplexCommand: Сложные вещи должны выполняться объектом-получателем.\n";
        $this->receiver->doSomething($this->a);
        $this->receiver->doSomethingElse($this->b);
    }
}
