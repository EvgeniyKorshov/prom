<?php

/**
 * Базовый интерфейс Компонента определяет поведение, которое изменяется
 * декораторами.
 */
interface Notifier
{
    public function send() : string;
}

/**
 * Конкретные Компоненты предоставляют реализации поведения по умолчанию. Может
 * быть несколько вариаций этих классов.
 */
class BaseNotifier implements Notifier
{
    public function send() : string
    {

        return "Автоматическая рассылка сообщений";
    }
}

/**
 * Базовый класс Декоратора следует тому же интерфейсу, что и другие компоненты.
 * Основная цель этого класса - определить интерфейс обёртки для всех конкретных
 * декораторов. Реализация кода обёртки по умолчанию может включать в себя поле
 * для хранения завёрнутого компонента и средства его инициализации.
 */
class Decorator implements Notifier
{
    /**
     * @var Notifier
     */
    protected $notifier;

    public function __construct(Notifier $notifier)
    {

        $this->notifier = $notifier;
    }

    /**
     * Декоратор делегирует всю работу обёрнутому компоненту.
     */
    public function send() : string
    {

        return $this->notifier->send();
    }
}

/**
 * Конкретные Декораторы вызывают обёрнутый объект и изменяют его результат
 * некоторым образом.
 */
class sms extends Decorator
{
    /**
     * Декораторы могут вызывать родительскую реализацию операции, вместо того,
     * чтобы вызвать обёрнутый объект напрямую. Такой подход упрощает расширение
     * классов декораторов.
     */
    public function send() : string
    {

        return "СМС(" . parent::send() . ")";
    }
}

/**
 * Декораторы могут выполнять своё поведение до или после вызова обёрнутого
 * объекта.
 */
class email extends Decorator
{
    public function send() : string
    {

        return "Почта(" . parent::send() . ")";
    }
}
class cn extends Decorator
{
    public function send() : string
    {

        return "хром(" . parent::send() . ")";
    }
}

/**
 * Клиентский код работает со всеми объектами, используя интерфейс Компонента.
 * Таким образом, он остаётся независимым от конкретных классов компонентов, с
 * которыми работает.
 */
function clientCode(Notifier $component)
{

    // ...

    echo $component->send() . '<br>';

    // ...
}

/**
 * Таким образом, клиентский код может поддерживать как простые компоненты...
 */
$simple = new BaseNotifier();

/**
 * ...так и декорированные.
 *
 * Обратите внимание, что декораторы могут обёртывать не только простые
 * компоненты, но и другие декораторы.
 */
$decorator1 = new sms($simple);
$decorator2 = new email($simple);
$decorator3 = new cn($simple);
clientCode($decorator1);
clientCode($decorator2);
clientCode($decorator3);