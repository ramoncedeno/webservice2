<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// allows migrating all seeders declared within the database

// class DatabaseSeeder extends Seeder
// {
//     /**
//      * Seed the application's database.
//      */
//     public function run(): void
//     {
//         $this->call([
//             UserSeeder::class,
//         ]);
//     }
// }

// default laravel
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database. php artisan db:see
     */
    public function run(): void
    {
        \App\Models\User::factory(1000)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

}
