<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
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
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Product</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    
    include "connect.php";
    $sql = "SELECT * FROM product";
    $result = mysqli_query($con, $sql);
    
    ?>

    <div class="container">
        <div class="row">


         <?php
         
         while($row = mysqli_fetch_array($result)){
         
         ?>

         <div class="col-lg-4 mt-3 mb-3">
            <div class="card-deck">
                <div class="card border-info p-2">
                    <img src="<?= $row['product_image']; ?>" class="card-img-top" height="320" alt="">
                    <h5 class="card-title">Product Name : <?= $row['product_name']; ?></h5>
                    <h3>Price : R<?= number_format($row['product_price']); ?></h3>
                    <a href="order.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-block btn-lg">Buy Now</a>
                </div>
            </div>
         </div>
        <?php } ?>
        </div>
    </div>
</body>
</html>`