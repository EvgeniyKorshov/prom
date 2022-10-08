<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;

class NewsSeeder extends Seeder
{
  
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    
    private function getData(){
        $faker = FakerFactory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 25; $i++) {
            $data[] = [
                'title'=>$faker->sentence(rand(3,10)),
                'description'=>$faker->realText(rand(100,200)),
            ];
          }
          return $data;
    }
}

// composer require fakerphp/faker --dev
