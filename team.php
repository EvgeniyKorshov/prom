<?php

namespace RefactoringGuru\Command\Conceptual;

/**
 * Интерфейс Команды объявляет метод для выполнения команд.
 */
interface Command
{
    public function execute(): void;
}

/**
 * Некоторые команды способны выполнять простые операции самостоятельно.
 */
class pasteCommand implements Command
{
    private $paste;

    public function __construct(string $paste)
    {
        $this->paste = $paste;
    }

    public function execute(): void
    {
        echo $this->paste .'<br>';
    }
}
class copyCommand implements Command
{
    private $copy;

    public function __construct(string $copy)
    {
        $this->copy = $copy;
    }

    public function execute(): void
    {
        echo $this->copy .'<br>';
    }
}
class cutCommand implements Command
{
    private $cut;

    public function __construct(string $cut)
    {
        $this->cut = $cut;
    }

    public function execute(): void
    {
        echo $this->cut .'<br>';
    }
}
/**
 * Но есть и команды, которые делегируют более сложные операции другим объектам,
 * называемым «получателями».
 */
class Log implements Command
{
    /**
     * @var Receiver
     */
    private $receiver;

    /**
     * Данные о контексте, необходимые для запуска методов получателя.
     */
    private $a;
    private $b;
    private $c;
    private $d;

    /**
     * Сложные команды могут принимать один или несколько объектов-получателей
     * вместе с любыми данными о контексте через конструктор.
     */
    public function __construct(Receiver $receiver, string $a, string $b, string $c, string $d)
    {
        $this->receiver = $receiver;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
    }

    /**
     * Команды могут делегировать выполнение любым методам получателя.
     */
    public function execute(): void
    {
        $this->receiver->doSomething($this->a);
        $this->receiver->doSomethingElse($this->b);
        $this->receiver->doCancel($this->c);
        $this->receiver->doBackup($this->d);
    }
}

/**
 * Классы Получателей содержат некую важную бизнес-логику. Они умеют выполнять
 * все виды операций, связанных с выполнением запроса. Фактически, любой класс
 * может выступать Получателем.
 */
class Receiver
{
    public function doSomething(string $a): void
    {
        echo $a .'<br>';
    }

    public function doSomethingElse(string $b): void
    {
        echo $b .'<br>';
    }
    public function doCancel(string $c): void
    {
        echo $c .'<br>';
    }
    public function doBackup(string $d): void
    {
        echo $d .'<br>';
    }
}

/**
 * Отправитель связан с одной или несколькими командами. Он отправляет запрос
 * команде.
 */
class logic
{
    /**
     * @var Command
     */
    private $onStart;

    /**
     * @var Command
     */
    private $onFinish;

    /**
     * Инициализация команд.
     */
    public function setOnStart(Command $command): void
    {
        $this->onStart = $command;
    }

    public function setOnFinish(Command $command): void
    {
        $this->onFinish = $command;
    }

    /**
     * Отправитель не зависит от классов конкретных команд и получателей.
     * Отправитель передаёт запрос получателю косвенно, выполняя команду.
     */
    public function doSomethingImportant(): void
    {
        if ($this->onStart instanceof Command) {
            echo "файл открывается".'<br>';
            echo "выделяется участок кода".'<br>';
            $this->onStart->execute();
        }

       
        if ($this->onFinish instanceof Command) {
            $this->onFinish->execute();
            echo "файл закрывается".'<br>';
        }
    }
}

/**
 * Клиентский код может параметризовать отправителя любыми командами.
 */

$invoker = new Logic();
$invoker->setOnStart(new copyCommand("копирование"));
$receiver = new Receiver();
$invoker->setOnFinish(new Log($receiver, "Отправляется электронное письмо с логами", "Сохранением отчет",'Отмена действий','Восстановление предыдущих действий'));
$invoker->doSomethingImportant();
/*
$invoker = new Logic();
$invoker->setOnStart(new pasteCommand("Вставка"));
$receiver = new Receiver();
$invoker->setOnFinish(new Log($receiver, "Отправляется электронное письмо с логами", "Сохранением отчет",'Отмена действий','Восстановление предыдущих действий'));
$invoker->doSomethingImportant();


$invoker = new Logic();
$invoker->setOnStart(new cutCommand("Вырезание"));
$receiver = new Receiver();
$invoker->setOnFinish(new Log($receiver, "Отправляется электронное письмо с логами", "Сохранением отчет",'Отмена действий','Восстановление предыдущих действий'));
$invoker->doSomethingImportant();
*/