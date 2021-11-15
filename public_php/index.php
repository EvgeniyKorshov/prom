
<?php
$hello = '<h1>Hello, World!</h1>';
$title = 'Home page';
$year = date(Y);

$a = 5;
$b = '05';

$varA = 1;
$varB = 2;
?>

<html>
  <head>
    <title><?php echo $title; ?>
</title>
  </head>
  <body>
      <?php 
        echo $hello; 
        echo $year;
      ?>

&nbsp;год<br>

      <?php
        var_dump($a == $b);                             // Почему true?  строка '05' становится числом 5,5==5
        var_dump((int)'012345');                        // Почему 12345? потому что строка преобразована к числу
        var_dump((float)123.0 === (int)123.0);          // Почему false? разный тип значений
        var_dump((int)0 === (int)'hello, world');       // Почему true? строка преобразована к числу 0 ,0===0 
        var_dump((int)'hello, world');

        echo '<br>' . 'A=' . ++$varA;                  // изначально а = 1 после a = 2
        echo '<br>' . 'B=' . $varB-=1;                  // изначально b = 2 после b = 1
      ?>

<br><a href="http://gb.com/lesson-2.php">lesson-2</a>
<br><a href="http://gb.com/lesson-3.php">lesson-3</a>
<br><a href="http://gb.com/lesson-4.php">lesson-4</a>
  
  </body>
</html>
