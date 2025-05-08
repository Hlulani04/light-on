<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for purchasing</title>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Thank You for Purchasing!</h1>

            <?php

              include 'instamojo/Instamojo.php';
              // use your own api_key and auth_token 
              $api = new Instamojo\Instamojo('API_KEY', 'AUTH_TOKEN', 'https://test.instamojo.com/api/1.1/');

              $payid = $_GET['payment_request_id'];

              try{
                $response = $api->paymentRequestStatus($payid);

            ?>

           <h2>Payment Details</h2>
           <table class="table table-bordered">
            <tr>
                <th>You have purchased :</th>
                <td><?= $response['purpose']; ?></td>
            </tr>
            <tr>
                <th>Payment ID :</th>
                <td><?= $response['payments'][0]['payment_id']; ?></td>
            </tr>
            <tr>
                <th>Payment Price :</th>
                <td><?= $response['payments'][0]['payment_price']; ?></td>
            </tr>
            <tr>
                <th>Payee Name :</th>
                <td><?= $response['payments'][0]['buyer_name']; ?></td>
            </tr>
            <tr>
                <th>Payee Email :</th>
                <td><?= $response['payments'][0]['payment_email']; ?></td>
            </tr>
           </table>

            <?php
              }
              catch(Exception $e){
                print("Error:" .$e->getMessage());
              }
         
            ?>

            </div>
        </div>
    </div>
</body>
</html>