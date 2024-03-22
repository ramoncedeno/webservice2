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
                'email'=>'ramon.c@allphptricks.com',
                'password'=> Hash::make('javed1234')
            ],
            [
                'name'=>'Cesar Valencia',
                'email'=>'cesar.c@allphptricks.com',
                'password'=> Hash::make('ahsan1234')
            ],
            [
                'name'=>'Miguel Morales',
                'email'=>'miguel.m@allphptricks.com',
                'password'=> Hash::make('muqeet1234')
            ]
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($users as $user){
            User::create($user);
        }
    }
}
