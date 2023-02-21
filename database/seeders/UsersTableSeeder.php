<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Antonio',
            'email' => 'antonio@gmail.com',
            'password' => bcrypt('antonio123'), // password
            
            // inicio edit
            'dni' => '39960257',
            'address' => '',
            'phone' => '',
            'role' => 'admin' 
        ]);


        \App\Models\User::factory(10)->create(); //CORRECTO
        
    }
}
