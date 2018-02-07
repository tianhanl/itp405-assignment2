<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Playlists</title>
</head>
<body>
    <h1>
        {{$playlist->Name}}
    </h1>
    <h2>
        Tracks
    </h2>
    <ul>
        @foreach($tracks as $track)
        <li>
            {{$track->Name}}
        </li>
        @endforeach
    </ul>
</body>
</html>