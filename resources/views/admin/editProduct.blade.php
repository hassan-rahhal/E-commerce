<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Edit Product </h1>
    <form method="POST" action="/admin/product/edit/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="" value="{{$product->name}}" placeholder="Name"><br><br>
        <input type="number" name="price" value="{{$product->price}}" id="" placeholder="Price"><br><br>
        <input type="number" name="quantity" value="{{$product->quantity}}" id="" placeholder="Quantity"><br><br>

        <textarea name="description" id="" cols="30" rows="10">{{$product->description}}</textarea><br><br>
        <img src="/assets/uploads/{{$product->main_img}}" width="200px">
        <input type="file" name="main_img" id=""><br><br>
        <input type="submit" value="Edit Product">
    </form>
</body>
</html>