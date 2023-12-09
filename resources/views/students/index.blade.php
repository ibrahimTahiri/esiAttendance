<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
</head>
<body>
    <menu>
        <ul>
            <li><a href="{{ route('students.index') }}">Students</a></li>
            <li><a href="{{ route('lessons.index') }}">Lessons</a></li>
        </ul>
    </menu>
    <h1>Liste des Étudiants</h1>

    <table>
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->matricule }}</td>
                <td>
                    <a href="{{ route('students.show', ['id' => $student->matricule]) }}">
                        {{ $student->nom }}
                    </a>
                </td>
                <td>
                    <form method="POST" action="{{ route('students.delete', ['id' => $student->matricule]) }}">
                        @csrf
                        @method('DELETE')

                        <input type="submit" class="delete-button-{{ $student->matricule }}"data-id="{{ $student->matricule }}" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Ajoutez le lien vers la page d'ajout d'étudiant -->
    <a href="{{ route('students.create') }}">Ajouter un Étudiant</a>

</body>
</html>
