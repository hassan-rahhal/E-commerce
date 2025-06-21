<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='/assets/css/index.css' rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Add Product Category</h1>
    <form method="POST" action="/admin/product/category/add/{{$product->id}}">
        @csrf
        <select name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Add">
    </form>

    <h2>Categories</h2>
    <ul>
        @foreach($product->product_categories as $product_category)
            <li><span>{{$product_category->category->name}}</span><a href="/admin/product/category/delete/{{$product_category->id}}">Delete</a></li>
        @endforeach
    </ul>
</body>
</html>