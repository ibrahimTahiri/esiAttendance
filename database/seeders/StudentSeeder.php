<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        info("run seed");

        Student::create([
            'matricule'=>58963,
            'nom'=>'Modrich'
        ]);

        Student::create([
            'matricule'=>54314,
            'nom'=>'Younes'
        ]);
        Student::create([
            'matricule'=>52075,
            'nom'=>'Yassine'
        ]);
        Student::create([
            'matricule'=>54785,
            'nom'=>'Yahya'
        ]);
        Student::create([
            'matricule'=>56172,
            'nom'=>'Youssef'
        ]);
        Student::create([
            'matricule'=>52784,
            'nom'=>'Marwan'
        ]);
        
    }
}
