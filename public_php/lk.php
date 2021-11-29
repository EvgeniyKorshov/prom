<?php 
session_start();
$servername = "gb.com";
$username = "developer-evgeniy";
$password = "403)(nlr)ivJk8(4";
$dbname = "store_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email,name FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      if(in_array($row["email"],$_POST)){
        echo "Личный кабинет" . "<br>";
        echo "Привет, " . $row["name"] . "<br>";
        echo "Почта: " . $row["email"];
      }
  }
  
} else {
  echo "0 results";
}
$conn->close();
?>
