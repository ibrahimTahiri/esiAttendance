<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student Information</title>
</head>
<body>
    <h1>Edit Information of Student {{ $student->nom }}</h1>

    <form method="post" action="{{ route('students.update', ['id' => $student->matricule]) }}">
        @csrf
        <label for="matricule">Matricule:</label>
        <input type="text" id="matricule" name="matricule" value="{{ $student->matricule }}" required><br><br>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="{{ $student->nom }}" required><br><br>

        <!-- Add more fields for other student information as needed -->

        <!-- Submit Button -->
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
