<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Tracks</title>
</head>
<body>
    <table class="table">
        <tr>
            <th>Track Name</th>
            <th>Album Title</th>
            <th>Artist Name</th>
            <th>Price</th>
            <th>Media Type</th>
        </tr>
        @foreach($tracks as $track)
        <tr>
            <td>{{$track->Name}}</td>
            <td>{{$track->Album->Title}}</td>
            <td>{{$track->Album->Artist->Name}}</td>
            <td>
                {{$track->UnitPrice}}
            </td>
            <td>{{$track->MediaType->Name}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>