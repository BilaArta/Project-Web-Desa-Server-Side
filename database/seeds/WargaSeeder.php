<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 20; $i++){
            // insert data ke table Berita menggunakan Faker
            DB::table('wargas')->insert([
              'nama' => $faker->name,
              'alamat' => $faker->address,
              'nik' => $faker->unique(true)->numberBetween(510204, 999999),
              'jenisKelamin' => 'L',
              'tanggalLahir' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')->format('Y/m/d')
            ]);
        }
    }
}
