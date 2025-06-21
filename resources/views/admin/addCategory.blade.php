<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Add Category </h1>
    <form method="POST" action="/admin/categories/add">
        @csrf
        <input type="text" name="name" id="" placeholder="Name"><br><br>

        <input type="submit" value="Add Category">
    </form>
</body>
</html>