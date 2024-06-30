<?php 
    require_once('../db/connet.php');
    
    session_start();


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../asserts/css/style.css">
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#">
        <i class="bi bi-x-diamond-fill"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="dealer_home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dealer_UpdateInfo.php">User Info</i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Order
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="dealer_createOrder.php">Create Order</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="dealer_viewOrder.php">View Order</a></li>
            </ul>
          </li>

        </ul>
        <a class="btn btn btn-outline-success active" href="./checkout.php" role="button" style="margin-right:15px">Checkout</a>
        <form class="d-flex">
          <button class="btn btn-outline-success" type="button">Logout</button>
        </form>
      </div>
    </div>
  </nav>
    <div class="container">


        <div class="row">
            <div class="col-md-4 order-md-2 mb-4" style="
    margin-top: 25px;">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Major Assemblies</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$999</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Light Components</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$999</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Accessories</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$999</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Shipping Cost</h6>
                            <small>Weight Mode</small>
                        </div>
                        <span class="text-success">$15</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (HKD)</span>
                        <strong>$4011</strong>
                    </li>
                </ul>

            </div>
            <div class="col-md-8 order-md-1" style="
    margin-top: 25px;">
                <h4 class="mb-3"> Smart & Luxury Motor Company</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <table class="table">
                            <tbody>
                                <tr >
                                    <td><img src="../asserts/img/A-Sheet Metal/100001.jpg" style="width:50px; height:50px;"></td>
                                    <td class="align-middle ">A-Sheet Metal<br>100001</td>
                                    <td class="align-middle"><input type="number" id="tentacles" name="tentacles" min="1" max="100" value="1" /></td>
                                    <td class="align-middle">$999</td>
                                </tr>
                                <tr>
                                    <td><img src="../asserts/img/B-Major Assemblies/200001.jpg" style="width:50px; height:50px;"></td>
                                    <td class="align-middle">Major Assemblies<br>200001</td>
                                    <td class="align-middle"><input type="number" id="tentacles" name="tentacles" min="1" max="100" value="1" /></td>
                                    <td class="align-middle">$999</td>
                                </tr>
                                <tr>
                                    <td><img src="..\asserts\img\C-Light Components\300001.jpg" style="width:50px; height:50px;"></td>
                                    <td class="align-middle">Light Components<br>300001</td>
                                    <td class="align-middle"><input type="number" id="tentacles" name="tentacles" min="1" max="100" value="1" /></td>
                                    <td class="align-middle">$999</td>
                                </tr>
                                <tr>
                                <td><img src="..\asserts\img\D-Accessories\400001.jpg" style="width:50px; height:50px;"></td>
                                    <td class="align-middle">Accessories<br>400001</td>
                                    <td class="align-middle"><input type="number" id="tentacles" name="tentacles" min="1" max="100" value="1" /></td>
                                    <td class="align-middle">$999</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="row">
                    </div>
         

                    <h4 class="mb-3">Shipping Way</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="weightmode" name="shippingmethod" type="radio" class="custom-control-input"
                                checked required>
                            <label class="custom-control-label" for="credit">Weight Mode</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="quantity" name="shippingmethod" type="radio" class="custom-control-input"
                                required>
                            <label class="custom-control-label" for="debit">Quantity Mode</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                   
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Make Order</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>