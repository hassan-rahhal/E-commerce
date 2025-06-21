<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Add Carousel </h1>
    <form method="POST" action="/admin/carousel/add" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" id="" placeholder="title"><br><br>
        <input type="text" name="description" id="" placeholder="Description"><br><br>
        <input type="file" name="image" id=""><br><br>
        <input type="submit" value="Add Carousel">
    </form>
</body>
</html>