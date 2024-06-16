<?php

session_start();
if($_SESSION['login_status'] == false){
    echo "Forbidden Access";
    die;
}

if($_SESSION['usertype'] != 'Vendor'){
    echo "Unauthorised Access";
    die;
}

include "menu.html";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form enctype="multipart/form-data" action="upload.php" method="post" class="w-50 bg-warning p-4">
            <h3 class="text-center">Add Product</h3>
            <input class="form-control mt-2" type="text" name="name" placeholder="Product Name" required>
            <input class="form-control mt-2" type="number" min="1" placeholder="Product price" name="price" required>
            <textarea class="form-control mt-2" cols="30" rows="5" name="detail" placeholder="Product Description" required></textarea>
            <input class="form-control mt-2" name="pdtimg" type="file" accept=".jpg, .png, .jpeg" required>

            <div class="text-center mt-3">
                <button class="btn btn-success">Add</button>
            </div>

        </form>
    </div>
</body>
</html>