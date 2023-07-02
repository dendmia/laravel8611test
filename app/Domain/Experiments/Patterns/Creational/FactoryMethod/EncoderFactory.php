<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\FactoryMethod;

class EncoderFactory
{
    // Тот самый фабричный метод
    public function create(string $mode = 'blogs'): ApptEncoder
    {
        $encoder = null;
        if ($mode === 'blogs') {
            $encoder = new BlogsApptEncoder();
        } elseif ($mode === 'mega') {
            $encoder = new MegaApptEncoder();
        }
        return $encoder;
    }
}
