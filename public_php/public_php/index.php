<?php 

//подключение к бд
$servername = "gb.com";
$database = "php6";
$username = "developer-evgeniy";
$password = "403)(nlr)ivJk8(4";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);
// Проверяем соединение
if (!$conn) {
    die("Ошибка соединения с базой данных: " . mysqli_connect_error());
}



function img_php($conn){
      $sql = "SELECT post_id,address FROM images" ;
      
      $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo '<a href="/img/' .  $row["address"] . '" target="_blank"><img src="/img/' .  $row["address"] . '" class="image" /></a> ';
                  
                 
               
                }
          } else {
            echo "<p>Файлов нет</p>";
          }
      
}


?>
<html>
  <head>
    <title>Welcome to gb.com!</title>
  </head>
  <body>
  
  <a href="/catalog.php">Каталог</a>
  <a href="/culc.php">Калькулятор</a>
  <a href="/coments.php">Коментарии</a>
  
  

  <h1>Хостинг для изображений</h1>
  <div class="wraper">
  
  <form method="post" action="upload/upload.php" enctype="multipart/form-data">
    <input type="file" name="image">
    <button type="submit">Загрузить</button>
  </form>
  
  <div class="img" >
  
  <?php 
  img_php($conn);
  ?>
  
  </div>
  </div>
  
  
  </body>
</html>
<style>
  .image{
    width:200px;
    margin: 5px; 
  }
  .img{
    padding-left:12.5px;
    padding-bottom:12.5px;
    display: grid;
    grid-template-columns:1fr 1fr 1fr 1fr;
  }
 
  h1 {
      display: flex;
      justify-content:center
  }

  
  .wraper{
    background-color:#fff;
    
    width: 900px;
    margin: 0 auto;
  }

  

  ul
    {
    list-style-type: decimal;
    }

    form
      {
        display: flex;
        justify-content:center;
      }
      p
      {
        display: flex;
        justify-content:center;
      }
</style>


