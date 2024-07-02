<?php
require_once ('../db/connet.php');

session_start();

$session_total_price = 0;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                <a class="btn btn btn-outline-success active" href="./checkout.php" role="button"
                    style="margin-right:15px">Checkout</a>
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


                    <?php
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $session_total_price = 0;
                            ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $value['item_name'] ?></h6>
                                    <small class="text-muted"><?php echo "Quantity: " . $value['quantity'] ?></small>
                                </div>
                                <span
                                    class="text-muted"><?php echo "$" . number_format($value['price'] * $value['quantity']) ?></span>
                            </li>

                            <?php
                            $session_total_price += $value['price'] * $value['quantity'];
                        }
                    } else {
                        echo "<h1>Cart is empty</h1>";
                    }
                    ?>
                </ul>
                <li class="list-group-item d-flex justify-content-between">

                    <strong><?php if ($session_total_price == 0) {

                    } else {
                        echo "<span>Total (HKD)</span>";
                        echo "$" . number_format($session_total_price);

                    } ?></strong>
                </li>
                </ul>

            </div>
            <div class="col-md-8 order-md-1" style="margin-top: 25px;">
                <h4 class="mb-3"> Smart & Luxury Motor Company</h4>
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <table class="table">
                            <tbody>
                               
                                <?php 
                                    if(!empty($_SESSION['cart'])){
                                        foreach($_SESSION['cart'] as $key => $value){
                                            echo "<tr>";
                                            echo "<td><img src=\"".$value['item_image']."\" style='width:50px; height:50px;'></td>";
                                            echo " <td class=\"align-middle\">".$value['item_name']."<br>".$value['full_product_id']."</td>";
                                            echo "<td class=\"align-middle\"><input type=\"number\" id=\"tentacles\" name=\tentacles\"
                                            min=\"1\"  value=".$value['quantity']." /></td>";
                                            echo "<td class=\"align-middle\">$".$value['price'] * $value['quantity']."</td>";
                                            echo "<td> 
                                            <a href='checkout.php?action=remove&id=".$value['item_id']."'> 
                                            <button type=\"button\" class=\"btn btn-danger\">Remove</button>
                                            </a>
                                            </td>"
                                            ;
                                        }
                                    }
                                    
                                ?>
                                
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
    <?php
    if(isset($_GET['action'])){
        if($_GET['action'] == 'remove'){
            foreach($_SESSION['cart'] as $key => $value){
                if($value['item_id'] == $_GET['id']){
                    unset($_SESSION['cart'][$key]);
                    echo "<script>window.location = 'checkout.php'</script>";
                }
            }
        }
    }


?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>