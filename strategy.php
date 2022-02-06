<?php

/**
 * Контекст определяет интерфейс, представляющий интерес для клиентов.
 */
class Context
{
    /**
     * @var Strategy Контекст хранит ссылку на один из объектов Стратегии.
     * Контекст не знает конкретного класса стратегии. Он должен работать со
     * всеми стратегиями через интерфейс Стратегии.
     */
    private $strategy;

    /**
     * Обычно Контекст принимает стратегию через конструктор, а также
     * предоставляет сеттер для её изменения во время выполнения.
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Обычно Контекст позволяет заменить объект Стратегии во время выполнения.
     */
    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Вместо того, чтобы самостоятельно реализовывать множественные версии
     * алгоритма, Контекст делегирует некоторую работу объекту Стратегии.
     */
    public function doSomeBusinessLogic(): void
    {
        // ...
      
       
        $this->strategy-> basket([12, 14, 534, 43, 34]);
        $this->strategy-> processing_payment('обработке запроса на оплату');
        $this->strategy-> response_payment('получение ответа от платёжной системы');
        $this->strategy->  complete('оплата прошла успешно');
        $this->strategy->  user('клиент ','8-123-123-43-55');
        // ...
    }
}

/**
 * Интерфейс Стратегии объявляет операции, общие для всех поддерживаемых версий
 * некоторого алгоритма.
 *
 * Контекст использует этот интерфейс для вызова алгоритма, определённого
 * Конкретными Стратегиями.
 */
interface Strategy
{
    public function user($name,$phone);
    public function basket(array $data);
    public function processing_payment($payment);
    public function response_payment($response_payment);
    public function complete($complete);
}

/**
 * Конкретные Стратегии реализуют алгоритм, следуя базовому интерфейсу
 * Стратегии. Этот интерфейс делает их взаимозаменяемыми в Контексте.
 */
class Yandex implements Strategy
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }
    public function  basket(array $data)
    {
        echo $this->title.'<br>';
        $sum = array_sum($data);
         echo 'в корзине '. count($data).' товаров на сумму '.$sum."<br>";
      
    }
    public function processing_payment($payment)
    {
        echo $payment."<br>";
    }
    public function response_payment($response_payment)
    {
        echo $response_payment."<br>";
    }
    public function complete($complete){
        echo $complete."<br>";
    }
    public function user($name,$phone){
       echo $name.$phone."<br>";
    }
}

class Webmani implements Strategy
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }
    public function  basket(array $data)
    {
        echo $this->title.'<br>';
        $sum = array_sum($data);
        echo 'в корзине '. count($data).' товаров на сумму '.$sum."<br>";
       
    }
    public function processing_payment($payment)
    {
        echo $payment."<br>";
    }
    public function response_payment($response_payment)
    {
        echo $response_payment."<br>";
    }
    public function complete($complete){
        echo $complete."<br>";
    }
    public function user($name,$phone){
        echo $name.$phone."<br>";
     }
    
}
class Qiwi implements Strategy
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }
    public function basket(array $data)
    {
        echo $this->title.'<br>';
       
        $sum = array_sum($data);
        echo 'в корзине '. count($data).' товаров на сумму '.$sum."<br>";
        
    }
    public function processing_payment($payment)
    {
        echo $payment."<br>";
    }
    public function response_payment($response_payment)
    {
        echo $response_payment."<br>";
    }
    public function complete($complete){
        echo $complete."<br>";
    }
    public function user($name,$phone){
        echo $name.$phone."<br>";
     }
    
}

/**
 * Клиентский код выбирает конкретную стратегию и передаёт её в контекст. Клиент
 * должен знать о различиях между стратегиями, чтобы сделать правильный выбор.
 */

        $context = new Context(new Yandex("Выбрана платежная система яндекс"));
        $context->doSomeBusinessLogic();
      
        //$context->setStrategy(new Webmani("Выбрана платежная система вэбмани"));
        //$context->doSomeBusinessLogic();
       
        //$context->setStrategy(new Qiwi ("Выбрана платежная система киви"));
        //$context->doSomeBusinessLogic();
       

 