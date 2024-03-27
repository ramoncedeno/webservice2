<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Sample Dummy Users Array
        $users = [
            [
                'name'=>'Ramón Cedeño',
                'email'=>'r.cedeno@uinenlinea.mx',
                'password'=> Hash::make('12345678')
            ],
            [
                'name'=>'Cesar Valencia',
                'email'=>'cesar.v@gmail.com.com',
                'password'=> Hash::make('12345678')
            ],
            [
                'name'=>'Miguel Morales',
                'email'=>'miguel.v@gmail.com',
                'password'=> Hash::make('muqeet1234')
            ]
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($users as $user){
            User::create($user);
        }
    }
}
