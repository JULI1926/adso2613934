<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games Excel</title>
</head>
<body>
    <table>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Developer</th>
            <th>Release Date</th>
            <th>Price</th>
            <th>Genre</th>
            <th>Slider</th>
            <th>Description</th>
        </tr>
        @foreach($games as $game)
        <tr>
            <td>{{ $game->title }}</td>
            <td><img src="{{ asset($game->image) }}" alt="{{ $game->title }}" width="40px"></td>
            <td>{{ $game->developer }}</td>
            <td>{{ $game->releasedate }}</td>
            <td>{{ $game->price }}</td>
            <td>{{ $game->genre }}</td>
            <td>{{ $game->slider }}</td>
            <td>{{ $game->description }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>