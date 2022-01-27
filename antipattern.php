<?php 
/*
    //Спагетти-код. 
    //Бесполезные действия - два раза указан тэг скрипт
    //Чрезмерное использование глобальных переменных - мне кажется вместо переменных нужно использовать константы ,чтобы избежать ошибок в будущем

        <script>

            let name = 'Василий'
            let pass = prompt("Кто там?");
            if (pass == 'admin' ) {
            alert( 'Здравствуйте,' + name + '!');
            }else {
            alert( "Я вас не знаю" );
            }
        </script>
        <script>
        let summa = '1000' + "108"
        alert(summa);
        </script>

        <script>
            let a = prompt('Задайте температуру в градусах по Цельсию');
            let b = (9 / 5) * a + 32
            alert('Температура в градусах по Фаренгейту: ' + b + ' градусов');
        </script>

        //лапше код использование elseif вместо switch,использование переменных вместо констант.

            function numObj(){
                    let anyString = prompt("Введите число от 0 до 999");
                    let userinfo = { }
                    userinfo.number=anyString;
                    if(anyString<=999){
                    if(anyString>100) return  console.log("Сотни: " + anyString.charAt(0)+" Десятки: " + anyString.charAt(1)+" Единицы: " + anyString.charAt(2) + " Число: " + userinfo.number);
                    else if(anyString>10) return  console.log(" Десятки: " + anyString.charAt(0)+" Единицы: " + anyString.charAt(1) + " Число: " + userinfo.number);
                    else if (anyString<10) return console.log(" Единицы: " + anyString.charAt(0) + " Число: " + userinfo.number);
                    else console.log("Попробуйте еще раз");
                    }
                    else console.log("Введите число от 0 до 999 " + userinfo);
                    }
            numObj();
            
            //лапша - чрезмерное вложение if else,можно было оптимизировать.

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


                                                            if (!file_exists($myFile)) {
                                                                $data_query=mysqli_query($conn,"SELECT post_id,address,name,size from images");

                                                                while($data=mysqli_fetch_assoc($data_query)){
                                                                    $myFile =$data['post_id'] . ".php";
                                                                    $fo = fopen($myFile, 'w') or die("can't open file");

                                                                    $stringData='<img src="/img/' .  $data['address'] . '" width="900" /><br>' ;
                                                                    fwrite($fo, $stringData . $data['name'] . $data['post_id']  . ", размер файла: " . $data['size']);
                                                                    fclose($fo);
                                                                }
                                                                print "Файл $myFile создан" . "<br>";
                                                            } else {
                                                                print "Файл $myFile не создан" . "<br>";
                                                            }

                                print "Изображение загружено успешно";
                            }
                            else {
                                print "Загрузка изображения не удалась";
                            }



    }else{
        print "Загрузка не удалась! Требуется формат 'jpg', 'gif', 'png' и размер файла не должен превышать 1.3 mb";
    }

    //Антипаттерны ООП.В этом куске кода могла прозойти классовая солянка.

                    class Products
                {
                public $id;
                public $title;
                public $description;
                public $price;

                function __construct($id, $title, $description,$price){
                $this->id = $id;
                $this->title = $title;
                $this->description =  $description;
                $this->price =  $price;
                }
                // Метод для вывода статьи

                        public function view(){
                        echo "<h1>$this->title</h1><p>$this->description</p>";
                        echo "<p>Цена: $this->price руб</p>" ;
                        }
                }

                class Catalog extends Products
                {

                    public function render($title)
                        { 
                        echo "<p>Категория: $title </p>"; 
                        }
                }
                class evaluation_and_promotion extends Products
                {

                        public function markdown($title)
                        { 
                        echo "<p>причина скидки: $title </p>"; 
                        }
                        public function stock($title)
                        { 
                        echo "<p>причина скидки: $title </p>"; 
                        }
                }
                class warehouse extends Products
                {

                    public function render($quantity)
                        { 
                        echo "<p>На складе: $quantity штук </p>"; 
                        }
                }
                
                //Шифрованный (таинственный) код.
                //Использование аббревиатур вместо полноценного названия,что может привести к не читаемости кода($p = price).

                $p = 4000;

                $digital = new digital("цифровой товар",$p);
                echo $digital->render();
                echo $digital->culc();
                echo "<br>";
*/
