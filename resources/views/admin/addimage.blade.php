<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add image to {{$product->name}}</h1>
    <form method="POST" action="/admin/product/add/image/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id=""><br><br>
        <input type="submit" value="Add Image">
    </form>
</body>
</html>