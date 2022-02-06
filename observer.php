<?php

/**
 * PHP имеет несколько встроенных интерфейсов, связанных с паттерном
 * Наблюдатель.
 *
 * Вот как выглядит интерфейс Издателя:
 *
 * @link http://php.net/manual/ru/class.splsubject.php
 *
 *     interface SplSubject
 *     {
 *         // Присоединяет наблюдателя к издателю.
 *         public function attach(SplObserver $observer);
 *
 *         // Отсоединяет наблюдателя от издателя.
 *         public function detach(SplObserver $observer);
 *
 *         // Уведомляет всех наблюдателей о событии.
 *         public function notify();
 *     }
 *
 * Также имеется встроенный интерфейс для Наблюдателей:
 *
 * @link http://php.net/manual/ru/class.splobserver.php
 *
 *     interface SplObserver
 *     {
 *         public function update(SplSubject $subject);
 *     }
 */

/**
 * Издатель владеет некоторым важным состоянием и оповещает наблюдателей о его
 * изменениях.
 */
class Subject implements \SplSubject
{
    /**
     * @var int Для удобства в этой переменной хранится состояние Издателя,
     * необходимое всем подписчикам.
     */
    public $state;

    /**
     * @var \SplObjectStorage Список подписчиков. В реальной жизни список
     * подписчиков может храниться в более подробном виде (классифицируется по
     * типу события и т.д.)
     */

    private $observers;
    private $name;
    private $content;

    public function __construct($name,$content)
    {

        $this->observers = new \SplObjectStorage();
        $this->name = $name;
        $this->content=$content;
    }

    /**
     * Методы управления подпиской.
     */
    public function attach(\SplObserver $observer ): void
    {
        
        echo "Наблюдатель подписался".'<br>';
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        
        $this->observers->detach($observer);
        echo "Наблюдатель отписался".'<br>';
    }

    /**
     * Запуск обновления в каждом подписчике.
     */
    public function notify(): void
    {
        echo 'Уведомление от '.$this->name.$this->content.'<br>';
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Обычно логика подписки – только часть того, что делает Издатель. Издатели
     * часто содержат некоторую важную бизнес-логику, которая запускает метод
     * уведомления всякий раз, когда должно произойти что-то важное (или после
     * этого).
     */
    public function someBusinessLogic(): void
    {
        
            echo "Загрузка вакансий...".'<br>';
        $this->state = rand(0, 10);

            echo "Колличество вакансий: {$this->state}\n".'<br>';
        $this->notify();
    }
    
}

/**
 * Конкретные Наблюдатели реагируют на обновления, выпущенные Издателем, к
 * которому они прикреплены.
 */
class ConcreteObserverA implements \SplObserver
{
    private $name;
    private $email;
    private $experience;
    public function __construct($name,$email,$experience) {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }
    public function update(\SplSubject $subject): void
    {
        if ($subject->state < 3) {
            echo $this->name.' отреагировал на событие. Почта для связи : '.$this->email.'. Опыт работы '.$this->experience.' года'.'<br>';
        }
    }
}

class ConcreteObserverB implements \SplObserver
{
    private $name;
    private $email;
    private $experience;
    public function __construct($name,$email,$experience) {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }
    public function update(\SplSubject $subject): void
    {
        if ($subject->state == 0 || $subject->state >= 2) {
            echo $this->name.' отреагировал на событие. Почта для связи : '.$this->email.'. Опыт работы '.$this->experience.' года'.'<br>';
        }
    }
}

/**
 * Клиентский код.
 */

$subject = new Subject('HandHunter.gb','": требуется junior php разработчик"');

$o1 = new ConcreteObserverA('Василий','vasiiy@mail.ru','3');
$subject->attach($o1);

$o2 = new ConcreteObserverB('Иван','ivan@mail.ru','7');
$subject->attach($o2);

$subject->someBusinessLogic();
$subject->someBusinessLogic();

$subject->detach($o2);

$subject->someBusinessLogic();