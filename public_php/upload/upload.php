
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
echo "Соединение с базой данных успешное" . "<br>";

  
//
$image = $_FILES["image"];
$fileName=  $image["name"];
$fileSize = $image['size'];
$path = '../img/';
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
$allowedfileExtensions = array('jpg', 'gif', 'png','webp');

    if (in_array($fileExtension, $allowedfileExtensions) && $fileSize < 1300000) //проверка на формат и размер
        {
            if(!is_dir($path)){
                    mkdir($path,0777,true);  //проверка на директорию если ее нет то создается 
            }
            
            

                            if (move_uploaded_file($image["tmp_name"],$path . $newFileName) ) {//добавление файла через форму и загрузка его в базу данных
                                            $title = $path . $newFileName;
                                            $sql = "INSERT INTO images (address,size) VALUES ('$title','$fileSize')";

                                                if ($conn->query($sql) === TRUE) {
                                                echo "Новая запись в базу данных сделана" . "<br>";
                                                        
                                                } else {
                                                echo "Ошибка: " . $sql . "<br>" . $conn->error;
                                                }
                                                   
                                                        

                                print "Изображение загружено успешно";
                            }
                            else {
                                print "Загрузка изображения не удалась";
                            }
                              
                            

    }else{
        print "Загрузка не удалась! Требуется формат 'jpg', 'gif', 'png' и размер файла не должен превышать 1.3 mb";
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
         <br><a href="http://gb.com/">обратно</a>
    </body>
    </html>