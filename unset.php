<?php

for($i=0;$i<100000;$i++)
{
$arr[] = $i;
}


   function LinearSearch ($arr, $num) {
      $count = count($arr);
   
         for ($i=0; $i < $count; $i++) 
            {
               if ($arr[$i] == $num) return $i;
                  elseif ($arr[$i] > $num) return null;
            }
      return null;
   }
   
$value = LinearSearch ($arr, 9);

function foo($arr,$value)
   {
      unset($arr[$value]);
         foreach($arr as $el)
            {
                $el ; 
            }

   }

foo($arr,$value);

echo(count($arr)*1 . ' шагов ' . 'Линейный поиск ' . '<br>');
echo(bcdiv(count($arr),25000000000,6) . ' шагов ' . 'Бинарный поиск '  .   '<br>');
echo(bcdiv(count($arr),200000000000,7)  . ' шагов ' . 'Интерполяционный поиск ' . '<br>');