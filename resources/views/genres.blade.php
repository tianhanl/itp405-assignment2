<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Genres</title>
</head>
<body>
    <table class="table">
        <tr>
            <th>Genre</th>
            <th>Tracks</th>
        </tr>
        @foreach($genres as $genre)
        <tr>
            <td>{{$genre->Name}}</td>
            <td>
                <a href="/tracks/?genre={{$genre->Name}}">tracks</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>