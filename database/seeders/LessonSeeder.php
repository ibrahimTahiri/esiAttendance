<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
            'name' => 'Application Mobile',
            'short_name' => 'MOBG5',
            'given_date'=>'2023-09-28',
            'given_time'=>'14:30:00',
        ]);
    }
}
