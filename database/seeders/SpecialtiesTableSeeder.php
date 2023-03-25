<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Cirugía ora',
            'Odontología general',
            'Endodoncia',
            'Ortodoncia'
        ];
        foreach ($specialties as $specialtyName){
            $specialty = Specialty::create([
                'name' => $specialtyName
            ]);

            $specialty->users()->saveMany(
                \App\Models\User::factory()->count(3)->dentista()->make()
            );
            
        }

        \App\Models\User::find(2)->specialties()->save($specialty);

    }
        
}
