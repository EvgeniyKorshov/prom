<?php
class Products
{
public $id;
public $title;
public $description;
public $price;

function __construct($id, $title, $description,$price){
$this->id = $id;
$this->title = $title;
$this->description =  $description;
$this->price =  $price;
}
// Метод для вывода статьи

        public function view(){
        echo "<h1>$this->title</h1><p>$this->description</p>";
        echo "<p>Цена: $this->price руб</p>" ;
        }
}

class Catalog extends Products
{
    
    public function render($title)
        { 
         echo "<p>Категория: $title </p>"; 
        }
}
class evaluation_and_promotion extends Products
{
    
        public function markdown($title)
        { 
         echo "<p>причина скидки: $title </p>"; 
        }
        public function stock($title)
        { 
         echo "<p>причина скидки: $title </p>"; 
        }
}
class warehouse extends Products
{
    
    public function render($quantity)
        { 
         echo "<p>На складе: $quantity штук </p>"; 
        }
}

$a = new Products(1, 'AMD Ryzen 3 1200', 'Современный процессор AMD Ryzen 3 1200 создан на основе ядра Pinnacle Ridge и имеет 4 потока обработки данных','6900');

$b = new Products(2, 'GIGABYTE B450 AORUS ELITE V2', 'Если вы привыкли ни в чем себя не ограничивать, то выбирайте материнскую плату GIGABYTE B450 AORUS ELITE V2','3520');

$a->view();
echo Catalog::render('процессоры');
echo warehouse::render('25');
echo evaluation_and_promotion::markdown('Акция');

$b->view();
echo Catalog::render('Материнские платы');
echo warehouse::render('10');
echo evaluation_and_promotion::stock('Уценка');


/*
получается 1234 потому под Х выделяется память 
и с каждой итерацией число сохраняется и к нему плюсуется следующее

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

получается 1122 потому что каждое значение принадлежит своему экземпляру класса
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();

И последнее задание копия шестого задания поэтому его я пропускаю
*/
