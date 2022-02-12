<?php
$id = $_POST['id'];

if(isset($_COOKIE[$id])) {
    echo $_COOKIE[$id];
}else{
    connect_mysql();
}
        

function connect_mysql(){
    $conn = new mysqli("127.0.0.1:3306", "developer-evgeniy", "403)(nlr)ivJk8(4", "techcompanies");
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
            $global_id = $_POST['id'];
            $result = $conn->query("SELECT id, name, email FROM user where id = $global_id");
                if ($result->num_rows > 0 ) {
                    while($row = $result->fetch_assoc()) {
                    $map ='id: ' . $row['id']. ', name: ' .$row['name'].', email: ' .$row['email'];
                    setcookie($row['id'],$map, time()+3600);
                    echo $map;
                }
                } 
                else {
                echo "error";
                }
    $conn->close();
}
?>

