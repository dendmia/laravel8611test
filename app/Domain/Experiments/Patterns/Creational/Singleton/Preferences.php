<?php

declare(strict_types=1);

namespace App\Domain\Experiments\Patterns\Creational\Singleton;

class Preferences
{
    private array $props = [];
    private static Preferences $instance;
    private function __construct(){}
    public function setProperty(string $key, string $val): void
    {
        $this->props[$key] = $val;
    }
    public function getProperty(string $key) : string
    {
        return $this->props[$key];
    }
    public static function getInstance() : self
    {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }
        return self::$instance;
    }
}
