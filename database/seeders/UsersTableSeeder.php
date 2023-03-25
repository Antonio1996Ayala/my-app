<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

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

        \App\Models\User::create([
            'name' => 'Daniel',
            'email' => 'daniel@gmail.com',
            'password' => bcrypt('daniel123'), // password
            
            // inicio edit
            'dni' => '52960257',
            'address' => '',
            'phone' => '',
            'role' => 'dentista' 
        ]);

        \App\Models\User::create([
            'name' => 'Miguel',
            'email' => 'miguel@gmail.com',
            'password' => bcrypt('miguel123'), // password
            
            // inicio edit
            'dni' => '52960257',
            'address' => '',
            'phone' => '',
            'role' => 'paciente' 
        ]);


        \App\Models\User::factory()->count(30)->paciente()->create(); //CORRECTO
        
    }
}
