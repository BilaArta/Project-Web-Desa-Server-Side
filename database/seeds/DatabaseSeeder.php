<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RolesSeeder::class);
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'alamat' => 'Tibubiu',
            'tanggalLahir' => '1998-04-23',
            'nik' => 000
            
        ]);
        User::create([
            'name' => 'warga',
            'email' => 'warga@test.com',
            'password' =>'1998-04-23',
            'role' => 'warga',
            'alamat' => 'Tibubiu',
            'tanggalLahir' => '1998-04-23',
            'nik' => 5102042304980003
        ]);
    }
}
