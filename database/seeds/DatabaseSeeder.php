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
        ]);
    }
}
