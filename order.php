<?php

include "connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id='$id' ";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $pname = $row['product_name'];
    $pprice = $row['product_price'];
    $del_charge = 50;
    $total_price = $pprice + $del_charge;
    $pimage = $row['product_image'];

}
else{
    echo "No product found!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order page</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled Javascript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a href="#" class="navbar-brand">Chuks</a>
        <!-- Tooogler/collapside Button -->
        <button class="navbar-toogler" type="button" data-toggler="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="product.php" class="nav-link">Product</a>
                </li>
                <li class="nav-item">
                    <a href="categories.php" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
    </nav>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5">
                    <h2 class="text-center p-2 text-primary">Fill all the details to complete your order</h2>
                    <h3>Product Details :</h3>
                    <table class="table table-bordered width-500px">
                        <tr>
                            <th>Product Name :</th>
                            <td><?= $pname; ?></td>
                            <td rowspan="4" class="text-center"><img src="<?= $pimage; ?>" width="200" alt=""></td>
                        </tr>
                        <tr>
                            <th>Product Price :</th>
                            <td> R<?= number_format($pprice); ?></td>
                        </tr>
                        <tr>
                            <th>Delivery Charge :</th>
                            <td> R<?= number_format($del_charge); ?></td>
                        </tr>
                        <tr>
                            <th>Total Price :</th>
                            <td> R<?= number_format($total_price); ?></td>
                        </tr>
                    </table>
                    <h4>Enter your details :</h4>
                    <form action="pay.php" method="post" accept-charset="utf-8">
                        <input type="hidden" name="product_name" value="<?= $pname; ?>">
                        <input type="hidden" name="product_price" value="<?= $pprice; ?>">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Click to pay : R <?= number_format($total_price); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>