<!DOCTYPE html>
<html>
<head>
    <title>Games PDF</title>
</head>
<body>
    <h1>Games List</h1>
    <table>
        <thead>
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
        </thead>
        <tbody>
            @foreach($games as $game)
                <tr>
                    <td>{{ $game->title }}</td>
                    <td><img src="{{ $game->image }}" alt="{{ $game->title }}" width="100"></td>
                    <td>{{ $game->developer }}</td>
                    <td>{{ $game->releasedate }}</td>
                    <td>{{ $game->price }}</td>
                    <td>{{ $game->genre }}</td>
                    <td>{{ $game->slider }}</td>
                    <td>{{ $game->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>