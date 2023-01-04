<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $categories = ['Kafe','Tople Kafe','Hladne Kafe'];
    private $Parents = [null,'1','1'];

    public function run()
    {
//        $faker=Faker::create();
//        foreach ($this->categories as $category) {
//            \DB::table('categories')->insert([
//                'name' => $category,
//
//                'description' => $faker->paragraph,
//                for($i = 0;$i<$this->Parents.count();$i++)
//                {
//                    'parent_id' => $this->Parents[$i];
//                }
//            ]);
//        }
    }
}
