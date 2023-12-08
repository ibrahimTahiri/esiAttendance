<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Illuminate\Http\Response;
class StudentController extends Controller
{
    public function getStudents(){
        $students = Student::orderBy('matricule','asc')->get();
        return view('students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('students.create');
    }


    /**
     * Add a student
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'matricule' => [
                'required',
            ],
            'nom' => 'required',
        ]);

        info("fct store");

        // Vérifiez si un étudiant avec le même matricule existe déjà
        if (Student::where('matricule', $request->input('matricule'))->exists()) {
            info("Matricule déjà existant");
            throw new \Exception('Le matricule existe déjà.');
        }

        Student::create([
            'matricule' => $request->input('matricule'),
            'nom' => $request->input('nom'),
        ]);

        return redirect('/students')->with('success', 'Étudiant ajouté avec succès.',Response::HTTP_CREATED);
        // Retournez une réponse HTTP 201 en cas de succès
        // return response()->json(['message' => 'Étudiant ajouté avec succès.'], 201);
    }


    public function show($id)
    {
        // Récupérez l'étudiant en fonction de l'ID
        $student = Student::where('matricule', $id)->first();

        // Vérifiez si l'étudiant existe
        if (!$student) {
            return redirect('/students')->with('error', 'Étudiant non trouvé.');
        }

        return view('students.show', ['student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'matricule' => 'required',
            'nom' => 'required',
            // Add validation rules for other fields as needed
        ]);

        $student = Student::find($id);

        if (!$student) {
            return redirect('/students')->with('error', 'Étudiant non trouvé.');
        }

        $student->update($data);
        return redirect('/students/show/'. $student->matricule)->with('success','Étudiant mis à jour avec succès.');

        // return redirect()->back()->with('success', 'Étudiant mis à jour avec succès.');
    }

    public function delete($id)
    {
        $student = Student::where('matricule', $id)->first();

        if (!$student) {
            return redirect()->back()->with('error', 'Étudiant non trouvé.');
        }

        $student->delete();

        return redirect()->back()->with('success', 'Étudiant supprimé avec succès.', Response::HTTP_NOT_FOUND);
        // Retournez une réponse HTTP 204 en cas de suppression réussie
        //return response()->json(['message' => 'Étudiant supprimé avec succès.'], 204);
    }
}
