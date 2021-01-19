<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;


class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){
            // insert data ke table Berita menggunakan Faker
            DB::table('news')->insert([
              'deskripsi' => $faker->paragraph,
              'judulBerita' => $faker->title,
              'file' => $faker->imageUrl($width = 640, $height = 480),
            //   'jenis' => 1,
              'created_by' => 1
          ]);

      }
    }
}
