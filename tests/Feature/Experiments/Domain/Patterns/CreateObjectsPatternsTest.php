<?php

declare(strict_types=1);

namespace Experiments\Domain\Patterns;

use App\Domain\Experiments\Patterns\Creational\AbstractFactory\EnglishPageFactory;
use App\Domain\Experiments\Patterns\Creational\AbstractFactory\RussianPageFactory;
use App\Domain\Experiments\Patterns\Creational\Builder\Director;
use App\Domain\Experiments\Patterns\Creational\Builder\EnglishPhraseBuilder;
use App\Domain\Experiments\Patterns\Creational\FactoryMethod\BlogsApptEncoder;
use App\Domain\Experiments\Patterns\Creational\FactoryMethod\EncoderFactory;
use App\Domain\Experiments\Patterns\Creational\FactoryMethod\MegaApptEncoder;
use App\Domain\Experiments\Patterns\Creational\FactoryMethodPolymorphic\ConcreteCreator1;
use App\Domain\Experiments\Patterns\Creational\FactoryMethodPolymorphic\ConcreteCreator2;
use App\Domain\Experiments\Patterns\Creational\FactoryMethodPolymorphic\Creator;
use App\Domain\Experiments\Patterns\Creational\Singleton\Preferences;
use Tests\TestCase;

class CreateObjectsPatternsTest extends TestCase
{
/*  В продолжение FactoryMethod.php
В крупных приложениях могут понадобиться фаборики, формирующие связанные вместе совокупности классов.
абстрактный

Применимость: Паттерн можно часто встретить в PHP-коде, особенно там,
где требуется создание семейств продуктов (например, во всевозможных фреймворках).

Признаки применения паттерна: Паттерн можно определить по методам, возвращающим фабрику, которая, в свою очередь,
используется для создания конкретных продуктов, возвращая их через абстрактные типы или интерфейсы.

В этом примере паттерн Абстрактная фабрика предоставляет инфраструктуру для создания нескольких разновидностей
шаблонов для одних и тех же элементов веб-страницы.*/
    public function testAbstractFactory(): void
    {
    // Приложение выбирает тип конкретной фабрики и создаёт её динамически, исходя из конфигурации или окружения.
        $lang = 'eng';
        switch ($lang) {
            case 'eng':
                $englishPageFactory = new EnglishPageFactory();
                $this->assertEquals('English Header', $englishPageFactory->createHeader()->getText());
                $this->assertEquals('English Footer', $englishPageFactory->createFooter()->getText());

                break;
            case 'рус':
                $russianPageFactory = new RussianPageFactory();
                $this->assertEquals('Русский заголовок', $russianPageFactory->createHeader()->getText());
                $this->assertEquals('Русская подпись', $russianPageFactory->createFooter()->getText());
        }
    }

/*    Синглтон решает проблемы:
1. Объект должке быть доступен отовсюду в проектируемой системе
2. Объект не должен сохраняться в глобальной переменной, значение которой может быть случайно изменено
3. В проектируемой системе не должно быть более одного экземпляра

Плюсы и минусы:
Синглтон позволяет уменьшить количество параметров которыми перекидываются сущности во время работы,
но при этом глобальными переменными мы не пользуемся.
Проблема в том, что глобальный характер объекта Синглтона дает возможность программисту обойти каналы связи
используемые в интерфейсах классов. Те зависимость скрыта в теле метода и не объявляется в его сигнатуре, это
затрудняет отслеживание связей в системе.
Тем не менее умеренное использование Синглтона избавляет от излишнего загромождения при передаче ненужных
объектов в системе*/
    public function testSingleton(): void
    {
        $pref = Preferences::getInstance();
        $key = 'name';
        $name = 'Ivan';
        $pref->setProperty($key, $name);
        unset($pref);
        $pref2 = Preferences::getInstance();
        $this->assertEquals($name, $pref2->getProperty('name'));
    }

    public function testBuilder(): void
    {
        $builder = new EnglishPhraseBuilder();
        $director = new Director($builder);

        $director->buildMinimalPhrase();
        $this->assertEquals('text', $builder->getProduct()->toString());

        $director->buildPhraseWithRespect();
        $this->assertEquals('Hi dear friend text Best regards', $builder->getProduct()->toString());

// Помните, что паттерн Строитель можно использовать без класса Директор.
        $builder->produceHeader();
        $builder->produceFooter();
        $builder->getProduct();
    }

    public function testFactoryMethod(): void
    {
        //Обычная такая фабрика, много их везде
        $factory = new EncoderFactory();

        $this->assertInstanceOf(
            expected: BlogsApptEncoder::class,
            actual: $factory->create('blogs'),
        );

        $this->assertInstanceOf(
            expected: MegaApptEncoder::class,
            actual: $factory->create('mega')
        );
    }

    public function testFactoryMethodPolymorphic(): void
    {
        $clientCode = function (Creator $creator) {
            //
            return "Client: I'm not aware of the creator's class, but it still works. "
                . $creator->someOperation();
        };

        /**
         * Приложение выбирает тип создателя в зависимости от конфигурации или среды.
         */
        $this->assertEquals(
            expected: "Client: I'm not aware of the creator's class, but it still works. "
            . "Creator: The same creator's code has just worked with {Result of the ConcreteProduct #1 }",
            actual: $clientCode(new ConcreteCreator1()));

        $this->assertEquals(
            expected: "Client: I'm not aware of the creator's class, but it still works. "
            . "Creator: The same creator's code has just worked with {Result of the ConcreteProduct #2 }",
            actual: $clientCode(new ConcreteCreator2()));
    }
}
