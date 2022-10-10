<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }
     
    private function getData(){
        $faker = FakerFactory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 5; $i++) {
            $data[] = [
                'title'=>$faker->sentence(rand(1,3)),
            ];
          }
          return $data;
    }
}
