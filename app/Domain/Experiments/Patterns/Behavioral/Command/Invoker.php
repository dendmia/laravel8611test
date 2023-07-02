<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Behavioral\Command;

/**
 * Отправитель связан с одной или несколькими командами. Он отправляет запрос
 * команде.
 */
class Invoker
{
    private CommandInterface $onStart;
    private CommandInterface $onFinish;

    /**
     * Инициализация команд.
     */
    public function setOnStart(CommandInterface $command): void
    {
        $this->onStart = $command;
    }

    public function setOnFinish(CommandInterface $command): void
    {
        $this->onFinish = $command;
    }

    /**
     * Отправитель не зависит от классов конкретных команд и получателей.
     * Отправитель передаёт запрос получателю косвенно, выполняя команду.
     */
    public function doSomethingImportant(): void
    {
        echo "Invoker: Кто-нибудь хочет что либо сделать до того, как я начну работу?\n";
        if ($this->onStart instanceof CommandInterface) {
            $this->onStart->execute();
        }

        echo "Invoker: ...делает что-то очень важное...\n";

        echo "Invoker: Хочет ли кто-нибудь сделать, что-либо до того как я закончу?\n";
        if ($this->onFinish instanceof CommandInterface) {
            $this->onFinish->execute();
        }
    }
}
