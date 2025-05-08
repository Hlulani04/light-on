<?php

include "connect.php";
$msg = "";

if(isset($_POST['submit'])){
    $p_name = $_POST['pName'];
    $p_price = $_POST['pPrice'];

    $target_dir = "image/";
    $target_file = $target_dir.basename($_FILES['pImage']['name']);
    move_uploaded_file($_FILES['pImage']['tmp_name'], $target_file);
    
    $sql = "INSERT INTO product (product_name, product_price, product_image)
            VALUES('$p_name', '$p_price', '$target_file')";

    if(mysqli_query($con, $sql)){
        $msg = "Product added to successfully";
    }
    else{
        $msg = "Failed to add the product";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product information</title>
    <!-- Latest compiled and minified CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">-->
    <!-- jQuery library -->
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>-->
    <!-- Popper JS -->
   <!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>--> 
    <!-- Latest compiled Javascript -->
   <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>--> 
   
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light mt-5 rounded">
                <h2 class="text-center p-2">Add product information</h2>
                <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                    <div class="form-group">
                        <input type="text" name="pName" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pPrice" class="form-control" placeholder="Product Price" required>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="pImage" class="custom-file-input" id="customFile" required>
                            <label for="customFile" class="custom-file-label">Choose Product Image</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn bg-secondary text-light btn-block" value="Add">
                    </div>
                    <div class="form-group">
                        <h4 class="text-center"><?php echo $msg; ?></h4>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 bg-light p-4 mt-3 rounded">
                <a href="product.php" class="btn bg-info btn-warning btn-block text-light btn-lg">View products</a>
            </div>
        </div>
    </div>
</body>
</html>