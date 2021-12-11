<?php
abstract class Product {
    public $title;
    public $price;
    public function __construct($title,$price) {
      $this->title = $title;
      $this->price= $price;
    }
    abstract public function render();
   
  }
  
  class digital extends Product {
    public function render()  {
      return  $this->title  . PHP_EOL ;
    }
    public function culc() {
        return $this->price / 2;
    }

    
  }
  
  class physical extends Product {
    public function render()  {
      return  $this->title . PHP_EOL . $this->price;
    }
  }
  
  class weight extends Product {
    public function render()  {
      return  $this->title;
    }
    public function culc() {
        return $this->price / 100;
        
    }
  }
  $p = 4000;

  $digital = new digital("цифровой товар",$p);
  echo $digital->render();
  echo $digital->culc();
  echo "<br>";
  
  $physical = new physical("штучный физический товар",$p);
  echo $physical->render();
  echo "<br>";
  
  $weight = new weight("цена за 1 кг 100 р, вес товара в кг = ",$p);
  echo $weight->render();
  echo $weight->culc();
?> 