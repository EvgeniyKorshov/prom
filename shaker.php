<?php 

    $time_start = microtime(true);

    function shakerSort ($array) {
    $n = count($array);
    $left = 0;
    $right = $n - 1;
    do {
    for ($i = $left; $i < $right; $i++) {
    if ($array[$i] > $array[$i + 1]) {
    list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
    }
    }
    $right -= 1;
    for ($i = $right; $i > $left; $i--) {
    if ($array[$i] < $array[$i - 1]) {
    list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
    }
    }
    $left += 1;
    } while ($left <= $right);
    }

    for($i=1;$i<10000;$i++)
    {
    $array[] = $i;
    }
    $array[] = shuffle($array);

    shakerSort($array);

    $time_end = microtime(true);
    $time = $time_end - $time_start;
    echo "Ничего не делал $time секунд\n";
    //Ничего не делал 5.4120280742645 секунд
?>