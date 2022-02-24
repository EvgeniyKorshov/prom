<?php
$time_start = microtime(true);
// Реализация пирамидальной сортировки на Php

// Процедура для преобразования в двоичную кучу поддерева с корневым узлом i, что является
// индексом в arr[]. n - размер кучи

function heapify(&$arr, $n, $i)
{
    $largest = $i; // Инициализируем наибольший элемент как корень
    $l = 2*$i + 1; // левый = 2*i + 1
    $r = 2*$i + 2; // правый = 2*i + 2

    // Если левый дочерний элемент больше корня
    if ($l < $n && $arr[$l] > $arr[$largest])
        $largest = $l;

    //Если правый дочерний элемент больше, чем самый большой элемент на данный момент
    if ($r < $n && $arr[$r] > $arr[$largest])
        $largest = $r;

    // Если самый большой элемент не корень
    if ($largest != $i)
    {
        $swap = $arr[$i];
        $arr[$i] = $arr[$largest];
        $arr[$largest] = $swap;

        // Рекурсивно преобразуем в двоичную кучу затронутое поддерево
        heapify($arr, $n, $largest);
    }
}

//Основная функция, выполняющая пирамидальную сортировку
function heapSort(&$arr, $n)
{
    // Построение кучи (перегруппируем массив)
    for ($i = $n / 2 - 1; $i >= 0; $i--)
        heapify($arr, $n, $i);

    //Один за другим извлекаем элементы из кучи
    for ($i = $n-1; $i >= 0; $i--)
    {
        // Перемещаем текущий корень в конец
        $temp = $arr[0];
            $arr[0] = $arr[$i];
            $arr[$i] = $temp;

        // вызываем процедуру heapify на уменьшенной куче
        heapify($arr, $i, 0);
    }
}

/* Вспомогательная функция для вывода на экран массива размера n 
function printArray(&$arr, $n)
{
    for ($i = 0; $i < $n; ++$i)
        echo ($arr[$i]." ") ; 

} 
*/

// Управляющая программа
   
    for($i=1;$i<10000;$i++)
    {
    $arr[] = $i;
    }
    $arr[] = shuffle($arr);

    $n = sizeof($arr);

    heapSort($arr, $n);

    //echo 'Sorted array is ' . "\n";

   // printArray($arr , $n);

// Этот код предоставил Shivi_Aggarwal

$time_end = microtime(true);
$time = $time_end - $time_start;
echo "Ничего не делал $time секунд\n";
//Ничего не делал 0.037873029708862 секунд
?>