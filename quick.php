<?php

$time_start = microtime(true);


function quickSort(&$arr, $low, $high) {
        $i = $low;                
        $j = $high;
        $middle = $arr[ ( $low + $high ) / 2 ];   // middle – опорный элемент; в нашей реализации он находится посередине между low и high
        do {
            while($arr[$i] < $middle) ++$i;  // Ищем элементы для правой части
             while($arr[$j] > $middle) -$j;   // Ищем элементы для левой части
                if($i <= $j){           
// Перебрасываем элементы
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
// Следующая итерация
                $i++; $j--;
            }
        }
        while($i < $j);
        
        if($low < $j){
// Рекурсивно вызываем сортировку для левой части
          quickSort($arr, $low, $j);
        }
 
        if($i < $high){
// Рекурсивно вызываем сортировку для правой части
          quickSort($arr, $i, $high);
        }
}


for($i=1;$i<10000;$i++)
{
$arr[] = $i;
}
$arr[] = shuffle($arr);

quickSort($arr, $low, $high);

$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Ничего не делал $time секунд\n";
//Ничего не делал 0.00070309638977051 секунд
?>