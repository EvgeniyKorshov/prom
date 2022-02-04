<?php
/**
 * Целевой класс объявляет интерфейс, с которым может работать клиентский код.
 */
class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        return 'Площадь круга: '.  round((pi() * $diagonal**2)/4,1)  . '<br>';
          
    }
}

/**
 * Адаптируемый класс содержит некоторое полезное поведение, но его интерфейс
 * несовместим с существующим клиентским кодом. Адаптируемый класс нуждается в
 * некоторой доработке, прежде чем клиентский код сможет его использовать.
 */
interface ICircle
{
function circleArea(int $circumference);
}
class Adaptee implements ICircle
{
function circleArea(int $circumference){
    return round((2*pi()*($circumference/2)),1);
}
}
/**
 * Адаптер делает интерфейс Адаптируемого класса совместимым с целевым
 * интерфейсом.
 */
class Adapter extends CircleAreaLib
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function getCircleArea($diagonal)
    {
       return "Длина окружности: " . round($this->adaptee-> circleArea($diagonal),1);
    }
}

/**
 * Клиентский код поддерживает все классы, использующие целевой интерфейс.
 */
function clientCode(CircleAreaLib $CircleAreaLib)
{
    echo $CircleAreaLib->getCircleArea(20);
}

$CircleAreaLib = new CircleAreaLib();
clientCode($CircleAreaLib);

$adaptee = new Adaptee();
echo "Adaptee: " . $adaptee->circleArea(20) . '<br>';

$adapter = new Adapter($adaptee);
clientCode($adapter);

