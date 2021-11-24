<?php
$servername = "gb.com";
$database = "php6";
$username = "developer-evgeniy";
$password = "403)(nlr)ivJk8(4";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT products.id,products.title,products.price,products.description,images.address from products JOIN (images) ON (products.id =images.post_id);";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo '<img src="/img/' .  $row["address"] . '" width="100" /><br>' . $row["title"] . PHP_EOL . "цена: " . $row["price"] . "<br>" . "описание: <br>" . $row["description"] . "<br><hr>";
  }
} else {
  echo "0 results";
}

$conn = new mysqli("gb.com", "developer-evgeniy", "403)(nlr)ivJk8(4", "example_database");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->close();
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
    
</body>
</html>






