<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

<<<<<<< Updated upstream
        $this->call([
           CategorySeeder::class,
            NewsSeeder::class,
=======
       $this->call([
           ResourceSeeder::class
>>>>>>> Stashed changes
        ]);

        \App\Models\User::factory(2)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('123'),
            'is_admin' => true
        ]);
    }
}
