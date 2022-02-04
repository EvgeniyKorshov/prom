<?php
/**
 * Целевой класс объявляет интерфейс, с которым может работать клиентский код.
 */
class SquareAreaLib
{
    
   public function getSquareArea(int $diagonal)
   {
    return 'Площадь квадрата: '. ($diagonal**2)/2 . '<br>';

   }

}

/**
 * Адаптируемый класс содержит некоторое полезное поведение, но его интерфейс
 * несовместим с существующим клиентским кодом. Адаптируемый класс нуждается в
 * некоторой доработке, прежде чем клиентский код сможет его использовать.
 */
interface ISquare
{
function squareArea(int $sideSquare);
}
class Adaptee implements ISquare
{
   public function squareArea(int $sideSquare){
    return  round(sqrt($sideSquare),1);

    
}
}
/**
 * Адаптер делает интерфейс Адаптируемого класса совместимым с целевым
 * интерфейсом.
 */
class Adapter extends SquareAreaLib
{
    private $adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->adaptee = $adaptee;
    }

    public function getSquareArea($diagonal)
    {
       return "Сторона квадрата: " . round($this->adaptee-> squareArea($diagonal),1);
    }
}

/**
 * Клиентский код поддерживает все классы, использующие целевой интерфейс.
 */
function clientCode(SquareAreaLib $SquareAreaLib)
{
    echo $SquareAreaLib->getSquareArea(2);
}

$SquareAreaLib = new SquareAreaLib();
clientCode($SquareAreaLib);

$adaptee = new Adaptee();
echo "Adaptee: " . $adaptee->squareArea(2) . '<br>';

$adapter = new Adapter($adaptee);
clientCode($adapter);

