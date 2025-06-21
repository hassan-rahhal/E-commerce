<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
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
    <script src="https://cdn.tiny.cloud/1/5i2hzh618cqamwy94m4f6jthwxyh3txe2pk6e6ueeo1596j2/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <h1> Add Product </h1>
    <form method="POST" action="/admin/products/add" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="" placeholder="Name"><br><br>
        <input type="number" name="price" id="" placeholder="Price"><br><br>
        <input type="number" name="quantity" id="" placeholder="Quantity"><br><br>

        <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>
        <textarea name="details" id="details" cols="30" rows="10"></textarea><br><br>

        <input type="file" name="main_img" id=""><br><br>
        <input type="submit" value="Add Product">
    </form>

    <script>
        tinymce.init({
          selector: '#details',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
      </script>
</body>
</html>