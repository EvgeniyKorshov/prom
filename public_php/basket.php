<?php
session_start();
$servername = "gb.com";
$username = "developer-evgeniy";
$password = "403)(nlr)ivJk8(4";
$dbname = "php6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,title,price FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $cart = $_POST;

   if(in_array($row["title"],$cart)){
    echo $row["title"] . '<br>' . $row["price"] . "<br>"; //рендер корзины
    echo $cart["count"] *= $row["price"];//сумма 
    $_SESSION["count"] += $cart["count"];//сумма + текущая сумма
    
   }
  }
} else {
  echo "0 results";
}
   
$conn->close();
?>

<hr><br><a href="catalog.php">Каталог</a>

