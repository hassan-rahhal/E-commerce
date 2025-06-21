<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Products Page</h1>
    <a href="/admin/products/add">Add Product</a>
    <h2>Products:</h2>
    <ul>
        @foreach ($products as $product)
            <li>
                <span>{{$product->name}}</span>
                <a  style="margin-left: 10px;" href="/admin/product/{{$product->id}}/categories">Add Tags</a>
                <a href="/admin/product/edit/{{$product->id}}">Edit</a>
                <a href="/admin/product/delete/{{$product->id}}">Delete</a>
                <a href="/admin/product/add/image/{{$product->id}}">Add Image</a>
            </li>
        @endforeach
    </ul>
</body>
</html>