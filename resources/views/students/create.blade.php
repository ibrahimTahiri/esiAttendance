<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
</head>
<body>
    <h1>Ajouter un Étudiant</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <label for="matricule">Matricule:</label>
        <input type="number" id="matricule" name="matricule" required>
        
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
