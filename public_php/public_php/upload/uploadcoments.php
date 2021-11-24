<?php
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
 $sql = "INSERT INTO coments (name, dignities, Disadvantages ,text,mail)
 VALUES ('$name', '$dignities', '$Disadvantages','$text','$mail')";
 
 if ($conn->query($sql) === TRUE) {
 echo "New record created successfully";
 } else {
 echo "Error: " . $sql . "<br>" . $conn->error;
 }  

?>