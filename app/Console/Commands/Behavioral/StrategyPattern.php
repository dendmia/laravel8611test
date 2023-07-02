<?php

namespace App\Console\Commands\Behavioral;

use App\Domain\Experiments\Patterns\Behavioral\Strategy\ConcreteStrategyA;
use App\Domain\Experiments\Patterns\Behavioral\Strategy\ConcreteStrategyB;
use App\Domain\Experiments\Patterns\Behavioral\Strategy\Context;
use Illuminate\Console\Command;

class StrategyPattern extends Command
{
    protected $signature = 'pattern:strategy';
    protected $description = 'Работа паттерна Стратегия';
    public function handle(): int
    {
        $this->alert('Паттерн Стратегия');
        $this->info("Клиентский код выбирает конкретную стратегию и передаёт её в контекст. " . PHP_EOL
            . "Клиент должен знать о различиях между стратегиями, чтобы сделать правильный выбор.");
        $context = new Context(new ConcreteStrategyA());
        $data = ["a", "b", "c", "d", "e"];
        $this->comment('Данные, которые над надо отсортировать выбрав стратегию из клиентского кода:');
        $this->error(implode(",", $data));

        $this->comment("Client: Strategy is set to normal sorting.");
        $context->doSomeBusinessLogic($data);

        $this->comment("Client: Strategy is set to reverse sorting.");
        $context->setStrategy(new ConcreteStrategyB());
        $context->doSomeBusinessLogic($data);

        return 0;
    }
}
