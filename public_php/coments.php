<?php 
    /*
    DROP DATABASE IF EXISTS php6;
    CREATE DATABASE php6;
    USE php6;

    DROP TABLE IF EXISTS coments;
    CREATE TABLE coments (
    id serial PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    Disadvantages VARCHAR(30) ,
    dignities VARCHAR(50),
    text VARCHAR(100),
    mail VARCHAR(30) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )
    */
   $coments = $_POST;
   $name  = $_POST['name'];
   $mail  = $_POST['mail'];
  $dignities = $_POST['dignities'] ;
  $Disadvantages = $_POST['Disadvantages'];
  $text =  $_POST['text'];

   $servername = "gb.com";
    $database = "php6";
    $username = "developer-evgeniy";
    $password = "403)(nlr)ivJk8(4";

    $conn = new mysqli($servername, $username, $password, $database);
  
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    
<form  method="POST" action="upload/uploadcoments.php">
     имя:<br> <input type="text" name="name"><br>
     почта:<br> <input type="text" name="mail"><br>
     Достоинства: <br><input type="text" name="dignities"><br>
     Недостатки: <br><input type="text" name="Disadvantages"><br>
    <p><b>Введите ваш отзыв:</b></p>
    <p><textarea rows="10" cols="45" name="text"></textarea></p>
    <p><input type="submit" value="Отправить"></p>
  </form>
<hr>
 <?php 

$sqlData = "SELECT name, dignities, Disadvantages ,text,date FROM coments";
$result = $conn->query($sqlData);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
    echo 'имя: ' . $row['name'] . "<br>" . 'достоинства: ' . $row['dignities'] . "<br>" . 'Недостатки: ' .$row['Disadvantages'] . "<br>" . 'Коментарий: ' .$row['text'] . "<br>" . 'Дата: ' .$row['date'] . "<br><hr>";
}
} else {
echo "0 results";
}
 ?>
  
</body>
</html>

