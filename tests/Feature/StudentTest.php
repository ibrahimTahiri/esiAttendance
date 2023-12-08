<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_route_students_return_200(): void
    {
        $response = $this->get('/students');

        $response->assertStatus(200);
    }

    public function test_fetch_student_by_key_and_receive_200()
    {
        $existingStudent = Student::where('matricule', '12346')->first();
        if ($existingStudent) {
            $existingStudent->delete();
        }
        $student = Student::create([
            'matricule' => '12346',
            'nom' => 'Jackie Chan',
        ]);


        $response = $this->get('/students/show/' . $student->matricule);

        $response->assertStatus(200);
    }
}
