<?php

use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 30; $i++){
            // insert data ke table Berita menggunakan Faker
            DB::table('news_categories')->insert([
                'category_id' => mt_rand(1, 4),
                'news_id' => $i
            ]);
        }
    }
}
