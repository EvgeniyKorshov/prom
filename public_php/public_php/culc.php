<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form method="POST">
         <input type="text" name="число-1">
         <select name="операции" >
                <option value="plus">сумма</option>
                <option value="minus">вычитание</option>
                <option value="delenie">деление</option>
                <option value="umnojenie">умножение</option>
                </select>
         <input type="text" name="число-2">
         <input type="submit">
     </form>

     <?php

$a = $_POST['число-1'];
$b =  $_POST['число-2'];

$operation = $_POST['операции'];

function delenie($a,$b){
    if($a == 0 || $b == 0){
        echo 'на ноль делить нельзя' ;
    }else echo $a / $b;
}
   
       
    switch ($operation) {
            case ("plus"):
                echo $a + $b;
                break;
            case ("minus"):
                echo $a - $b;
                break;
            case ("delenie"):
                delenie($a,$b);
                break;
            case ("umnojenie"):
                echo $a * $b;
                break;
            }
     ?>
</body>
</html>

