<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Categories Page</h1>
    <a href="/admin/categories/add">Add Category</a>
    <h2>Categories:</h2>
    <ul>
        @foreach ($categories as $category)
            <li>{{$category->name}}</li>
        @endforeach
    </ul>
</body>
</html>

