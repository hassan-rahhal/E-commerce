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