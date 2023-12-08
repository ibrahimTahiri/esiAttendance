<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <menu>
        <ul>
            <li><a href="{{ route('students.index') }}">Students</a></li>
            <li><a href="{{ route('lessons.index') }}">Lessons</a></li>
        </ul>
    </menu>
    <h1>Liste des Leçons</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Acronyme</th>
            <th>Date</th>
            <th>Heure</th>
        </tr>
        @foreach ($lessons as $lesson)
            <tr>
                <td>{{ $lesson->name }}</td>
                <td>{{$lesson ->short_name}}</td>
                <td>{{ $lesson->given_date }}</td>
                <td>{{$lesson ->given_time}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>