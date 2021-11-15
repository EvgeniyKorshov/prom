
<?php
$image = $_FILES["image"];
$fileName=  $image["name"];
$fileSize = $image['size'];
$path = '../img/';
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
$allowedfileExtensions = array('jpg', 'gif', 'png');


    if (in_array($fileExtension, $allowedfileExtensions) && $fileSize < 1300000)
        {
            if(!is_dir($path)){
                    mkdir($path,0777,true);  
            }
                            if (move_uploaded_file($image["tmp_name"], $path . $newFileName)) {
                                print "Загружено успешно!";
                                
                            }
                            else {
                                print "Загрузка не удалась!";
                            }
    
    }else{
        print "Загрузка не удалась! Требуется формат 'jpg', 'gif', 'png' и размер файла не должен превышать 1.3 mb";
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
        <a href="http://gb.com/lesson-4.php">обратно</a>
    </body>
    </html>