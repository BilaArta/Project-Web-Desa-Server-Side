<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Sosial', 
        ]);
        DB::table('categories')->insert([
            'name' => 'Bantuan', 
        ]);
        DB::table('categories')->insert([
            'name' => 'Adat', 
        ]);
        DB::table('categories')->insert([
            'name' => 'Pariwisata', 
        ]);
    }
}
