
<?php
/* Проводник для ubuntu */

switch ($_POST["dir"]) {
    case 'Гит':
        $git =  scandir('/home/evgeniy/Документы/GitHub/prom');
      break;
    case 'Документы':
        $git =  scandir('/home/evgeniy/Документы/');
      break;
      case 'Загрузки':
        $git =  scandir('/home/evgeniy/Загрузки');
      break; 
      case 'Видео':
        $git =  scandir('/home/evgeniy/Видео');
      break;
    case 'Музыка':
        $git =  scandir('/home/evgeniy/Музыка');
      break;
    case 'Изображения':
        $git =  scandir('/home/evgeniy/Изображения');
      break;
      case 'Рабочий стол':
        $git =  scandir('/home/evgeniy/Рабочий стол');
      break; 
      default:
        header("Refresh: 3; URL=/provodnik.php");
        echo 'Ошибка,сейчас вы будете перенаправлены на главную страницу';

  }

 
$obj = new ArrayObject( $git );
$iter = $obj->getIterator();
 
while( $iter->valid() )
{
    echo $iter->current() . "<br>";
    $iter->next();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="provodnik.php">назад</a>
</body>
</html>