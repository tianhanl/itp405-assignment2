<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Playlists</title>
</head>
<body>
    <ul>
        @foreach($playlists as $playlist)
        <li>
            <a href="/playlists/{{$playlist->PlaylistId}}">
                {{$playlist->Name}}
            </a>
        </li>
        @endforeach
    </ul>
</body>
</html>