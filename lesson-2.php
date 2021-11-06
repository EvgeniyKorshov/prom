<?php
$a = 5;
$b = 10;

function nmr($a,$b){
  switch ($a && $b < 0 || $a && $b > 0 || $a>0 && $a<0 || $a<0 && $a>0) {
    case ($a && $b < 0): //если $а и $b отрицательные, вывести их произведение;
        echo $a * $b;
        break;
    case ($a && $b > 0): //если $a и $b положительные, вывести их разность;
        echo  $a - $b;
        break;
    case ($a>0 && $a<0 || $a<0 && $a>0): //если $а и $b разных знаков, вывести их сумму;
        echo $a + $b;
        break;
    default: 
        echo "ERROR:";
        break;
}
}
function arr_for(){
    $arr = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
 
    foreach ($arr as &$value) {
      echo  $value++ . ',';
    }
  }

  
  
  
  function sum ($a,$b){
    return $a + $b;
  }
  function multiplication ($a,$b){
    return $a - $b;
  }
  function difference ($a,$b){
    return $a * $b ;
  }
  function division ($a,$b){
    return $a / $b;
  }


  $arg1 = 4;
  $arg2 = 5;
  //$operation = 'сложение';
  $operation = 'произведение';
  //$operation = 'вычитание';
  //$operation = 'деление';
  
  function monster($arg1,$arg2,$operation){
      switch ($operation) {
        case ('произведение'):
            echo difference($arg1,$arg2);
            break;
        case ('вычитание'): 
             echo multiplication($arg1,$arg2);
            break;
        case ('сложение'): 
            echo sum($arg1,$arg2);
            break;
        case ('деление'):
            echo division($arg1,$arg2);
            break;
        default: 
            echo "ERROR:";
            break;
        }  
    }  
    
    $year = date(Y);
  
    function power($val, $pow) {
      $result = 1;
    
      // умножаем result на $val $pow раз в цикле
      for ($i = 0; $i < $pow; $i++) {
        $result *= $val;
      }
    
      return $result;
    }
    
  function func_hours(){
    if (date( ' h ' ) < 2) {
      echo date( ' h ' ) . 'час ';
    }
    if (date( ' h ' ) >= 2 && date( ' h ' ) < 5) {
      echo date( ' h ' ) . 'часа ';
    }
    if (date( ' h ' ) >= 5 && date( ' h ' ) <= 12) {
      echo date( ' h ' ) . 'часов ';
    }
  }

  function func_minuts() {
    $minuts_varint1 = [1 ,21 ,31 ,41 ,51]; //минута
    $minuts_varint2 = [2,3,4,22,23,24,32,33,34,42,43,44,52,53,54]; //минуты
    $minuts_varint3 = [5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,25,35,45,55,26,36,46,56,27,37,47,57,28,38,48,58,29,39,49,59,30,40,50,60]; //минут
      
    $min = date( 'i ' );

    if(in_array($min,$minuts_varint3)){      
        echo $min . 'минут';     
    } 
    if(in_array($min,$minuts_varint2)){      
      echo $min . 'минуты';     
    } 
    if(in_array($min,$minuts_varint1)){      
      echo $min . 'минута';     
  } 
  }

?>

<html>
  <head>
    <title>Welcome to gb.com!</title>
  </head>
  <body>
    <h1>Success! The gb.com virtual host is working!</h1>
<a href="http://gb.com/">Home</a>
    <ul>
      <li><?php nmr($a,$b);?></li>
      <li><?php  arr_for();?>(switch я использовал в первом задании поэтому здесь я использовал foreach)</li>
      <li><?php echo sum($a,$b) . ',';  echo multiplication($a,$b)  . ','; echo difference($a,$b)  . ','; echo division($a,$b);?></li>
      <li><?php monster($arg1,$arg2,$operation); ?></li>
      <li>смотри подвал</li>
      <li><?php echo power(2, 3) ; ?></li>
      <li><?php func_hours() . func_minuts(); ?></li>
    </ul>
    <div class="podval">
     это подвал, все права защищены <?php echo $year; ?>
    </div>
  </body>
</html>


<style>
  h1 {
      display: flex;
      justify-content:center
  }

  .podval{
        margin:bottom;
        display: flex;
        justify-content:center;
      }
  ul{list-style-type: decimal;}
</style>
