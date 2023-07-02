<?php

namespace App\Console\Commands\Behavioral;

use App\Domain\Experiments\Patterns\Behavioral\Command\ComplexCommand;
use App\Domain\Experiments\Patterns\Behavioral\Command\Invoker;
use App\Domain\Experiments\Patterns\Behavioral\Command\Receiver;
use App\Domain\Experiments\Patterns\Behavioral\Command\SimpleCommand;
use Illuminate\Console\Command;

class CommandPattern extends Command
{
    protected $signature = 'pattern:command';
    protected $description = 'Работа паттерна Комманда';
    public function handle(Invoker $invoker, Receiver $receiver): int
    {
        $this->alert('паттерн Комманда');

        $this->comment("1. Вызываем у вызывающего объекта Invoker метод setOnStart и передаем комманду параметром");
        $this->comment("2. Вызываем у Invoker метод setOnFinish и передаем туда сложную комманду ComplexCommand, которая будет делегировать " . PHP_EOL
            . " получателю(Receiver) самому  выполнение комманды, вторым и третьим параметром передаем необходимые опции Send email и Save report" . PHP_EOL
            . " исходя из которых он должен будет действовать");

        $invoker->setOnStart(command: new SimpleCommand("Say Hi!"));
        $invoker->setOnFinish(new ComplexCommand($receiver, "Send email", "Save report"));
        $invoker->doSomethingImportant();
        return 0;
    }
}
