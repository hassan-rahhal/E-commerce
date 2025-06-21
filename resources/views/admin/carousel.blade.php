<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="/admin/carousel/add">Add New</a>
    <h1>Carousel</h1>
    <ul>
        @foreach($carousels as $carousel)
            <li>{{$carousel->title}}</li>
        @endforeach
    </ul>
</body>
</html>