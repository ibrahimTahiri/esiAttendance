<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use App\Models\Student;

class StudentTest extends DuskTestCase
{
    use DatabaseMigrations;


    /**
     * Test de l'affichage de la liste des étudiants.
     */
    public function testViewStudentsList()
    {
        Student::create([
            'matricule' => '54321',
            'nom' => 'Test Student',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/students')
                ->assertSee('Liste des Étudiants')
                ->assertSee('Test Student'); 
        });
    }

    /**
     * Test de l'affichage des détails d'un étudiant.
     */
    public function testViewStudentDetails()
    {
        Student::create([
            'matricule' => '54321',
            'nom' => 'Test Student',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/students/show/54321')
                ->assertSee('Test Student'); 
        });
    }

    /**
     * Test de la mise à jour des informations d'un étudiant.
     */
    public function testUpdateStudentInfo()
    {
        Student::create([
            'matricule' => '54321',
            'nom' => 'Test Student',
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/students/show/54321')
                ->type('matricule', '99999')
                ->type('nom', 'Updated Name')
                ->press('Save Changes')
                ->assertPathIs('/students/show/99999');
        });
    }

    /**
     * Test de la suppression d'un étudiant.
     */
    public function testDeleteStudent()
    {
        $this->browse(function (Browser $browser) {
            $student = Student::create([
                'matricule' => '54321',
                'nom' => 'Test Student',
            ]);

            $browser->visit('/students')
                ->assertSee('Test Student')
                ->within(".delete-button-54321", function ($button) {
                    $button->click();
                });

        });
    }

    /**
     * Test de la création d'un étudiant.
     */
    public function testAddStudent()
{
    $this->browse(function (Browser $browser) {
        // Visitez la page de création d'étudiant
        $browser->visit('/students/create')
            ->assertSee('Ajouter un Étudiant')
            ->type('matricule', '12345') 
            ->type('nom', 'Nouvel Étudiant') 
            ->press('Ajouter'); 
        $browser->assertPathIs('/students');
        $browser->assertSee('Nouvel Étudiant');
    });
}
}
