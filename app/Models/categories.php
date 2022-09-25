<?php

namespace App\Models;


class categories {
   private static $categories = [
[
    'id'=>1,
    'title'=>'Спорт',
    'news'=> array(
        array( 
               "id" =>1, 
               "title" =>"Спортивная новость",
               "disc" => "Описание новости" ,
              ),
       array( 
               "id" =>2, 
               "title" =>"Спортивная новость",
               "disc" => "Описание новости",
              ),
       array( 
               "id" =>3, 
               "title" =>"Спортивная новость",
               "disc" => "Описание новости",
       ),
       array( 
           "id" =>4, 
           "title" =>"Спортивная новость",
           "disc" => "Описание новости",
        ),
        array( 
           "id" =>5, 
           "title" =>"Спортивная новость",
           "disc" => "Описание новости",
       ),
           ),
],
[
    'id'=>2,
    'title'=>'Экономика',
    'news'=> array(
        array( 
               "id" =>1, 
               "title" =>"Экономическая новость",
               "disc" => "Описание новости" ,
              ),
       array( 
               "id" =>2, 
               "title" =>"Экономическая новость",
               "disc" => "Описание новости",
              ),
       array( 
               "id" =>3, 
               "title" =>"Экономическая новость",
               "disc" => "Описание новости",
       ),
       array( 
           "id" =>4, 
           "title" =>"Экономическая новость",
           "disc" => "Описание новости",
        ),
        array( 
           "id" =>5, 
           "title" =>"Экономическая новость",
           "disc" => "Описание новости",
       ),
           ),
],
[
    'id'=>3,
    'title'=>'Политика',
    'news'=> array(
        array( 
               "id" =>1, 
               "title" =>" Политическая новость",
               "disc" => "Описание новости" ,
              ),
       array( 
               "id" =>2, 
               "title" =>" Политическая новость",
               "disc" => "Описание новости",
              ),
       array( 
               "id" =>3, 
               "title" =>" Политическая новость",
               "disc" => "Описание новости",
       ),
       array( 
           "id" =>4, 
           "title" =>" Политическая новость",
           "disc" => "Описание новости",
        ),
        array( 
           "id" =>5, 
           "title" =>" Политическая новость",
           "disc" => "Описание новости",
       ),
           ),
],
[
    'id'=>4,
    'title'=>'Авто',
    'news'=> array(
        array( 
               "id" =>1, 
               "title" =>" Автомобильная новость",
               "disc" => "Описание новости" ,
              ),
       array( 
               "id" =>2, 
               "title" =>"Автомобильная новость",
               "disc" => "Описание новости",
              ),
       array( 
               "id" =>3, 
               "title" =>" Автомобильная новость",
               "disc" => "Описание новости",
       ),
       array( 
           "id" =>4, 
           "title" =>" Автомобильная новость",
           "disc" => "Описание новости",
        ),
        array( 
           "id" =>5, 
           "title" =>" Автомобильная новость",
           "disc" => "Описание новости",
       ),
           ),
],
[
    'id'=>5,
    'title'=>'Наука',
    'news'=> array(
                 array( 
                        "id" =>1, 
                        "title" =>" Научная новость",
                        "disc" => "Описание новости" ,
                       ),
                array( 
                        "id" =>2, 
                        "title" =>" Научная новость",
                        "disc" => "Описание новости",
                       ),
                array( 
                        "id" =>3, 
                        "title" =>" Научная новость",
                        "disc" => "Описание новости",
                ),
                array( 
                    "id" =>4, 
                    "title" =>" Научная новость",
                    "disc" => "Описание новости",
                 ),
                 array( 
                    "id" =>5, 
                    "title" =>" Научная новость",
                    "disc" => "Описание новости",
                ),
                    ),
    
],
        
    ] ;

    public static function getCategories():array{
        return static::$categories;
    }


    public static function getCategoriesId($id):array{
        foreach (static::getCategories() as $categories) {
            if($categories['id']== $id){
                return $categories;
            }
        }
        return null;
    }
}
