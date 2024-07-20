<?php
require_once ('../db/connet.php');

session_start();

$session_total_price = 0;
$total_price = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create_order'])) {
        $shippingMethod = $_POST['shippingmethod'];
        $totalWeight = $_POST['total_weight'];
        $totalCount = $_POST['total_count'];
        $subtotalPrice = $_POST['subtotal_price'];
        $shippingCost = $_POST['shipping_cost'];
        $totalPrice = $_POST['total_price'];

        // echo "Shipping method: " . $shippingMethod . "<br>";
        // echo "Shipping cost: " . $shippingCost . "<br>";
        // echo "Total price: " . $totalPrice . "<br>";
        // echo "Total weight: " . $totalWeight . "<br>";
        // echo "Total count: " . $totalCount . "<br>";
        // echo "Subtotal price: " . $subtotalPrice . "<br>";
        // echo "<br>";
        $canCreateOrder = true;
        // table column have order_date order_time address delivery_date deal_id sm_id order_status,sm will be null get the address from dealer table first
        //get the stock quantity from item table and check if the quantity is enough
        //if enough, create order and insert into order table and order_item table
        //if not enough, alert "not enough stock and show the id of the item that is not enough"
        foreach ($_SESSION['cart'] as $key => $value) {
            $item_full_product_id = $value['full_product_id'];
            $item_id = $value['item_id'];
            $quantity = $value['quantity'];
            $check_stock_sql = "SELECT quantity FROM item WHERE item_id = $item_id";
            $check_stock_result = mysqli_query($conn, $check_stock_sql);
            $check_stock_row = mysqli_fetch_assoc($check_stock_result);
            $stock_quantity = $check_stock_row['quantity'];
            if ($stock_quantity < $quantity) {
                // echo "Not enough stock for item ID: " . $item_id . "<br>";
                // echo "Stock quantity: " . $stock_quantity . "<br>";
                // echo "Order quantity: " . $quantity . "<br>";
                // echo "Please remove the item from cart and try again<br>";
                echo "<script>alert('Not enough stock for item ID: " . $item_full_product_id . "'); </script>";
                echo "<script>alert('Please remove the item from cart and try again'); </script>";
                $canCreateOrder = false;
            }
        }
        if ($canCreateOrder == true) {
            $addresssql = "SELECT address FROM user WHERE deal_id = " . $_SESSION['deal_id'];
            $addressresult = mysqli_query($conn, $addresssql);
            $addressrow = mysqli_fetch_assoc($addressresult);
            $address = $addressrow['address'];
            date_default_timezone_set('Asia/Hong_Kong');
            $order_date = date("Y-m-d");
            $order_time = date("H:i:s");
            // echo "Order date: " . $order_date . "<br>";
            // echo "Order time: " . $order_time . "<br>";
            // echo "Address: " . $address . "<br>";
            $expected_delivery_date = date('Y-m-d', strtotime($order_date . ' + 7 days'));
            $create_order_sql = "INSERT INTO `order` (order_date, order_time, address, delivery_date, deal_id,order_status,total_price,shipping_cost,shipping_method) VALUES ('$order_date', '$order_time', '$address', '$expected_delivery_date', " . $_SESSION['deal_id'] . ", 'waiting to process', $totalPrice, $shippingCost, '$shippingMethod')";
            if (mysqli_query($conn, $create_order_sql)) {
                // echo "Order created successfully<br>";
                $order_id = mysqli_insert_id($conn);
                // echo "Order ID: " . $order_id . "<br>";
                foreach ($_SESSION['cart'] as $key => $value) {
                    $item_id = $value['item_id'];
                    $quantity = $value['quantity'];
                    $price = $value['price'];
                    $create_order_detail_sql = "INSERT INTO order_item (order_id, item_id, quantity) VALUES ($order_id, $item_id, $quantity)";
                    if (mysqli_query($conn, $create_order_detail_sql)) {
                        echo '<script>console.log("Order created successfully");</script>';
                        //update the quantity of the item in the item table
                        $update_quantity_sql = "UPDATE item SET quantity = quantity - $quantity WHERE item_id = $item_id";
                        if (mysqli_query($conn, $update_quantity_sql)) {
                            echo '<script>console.log("Item quantity updated successfully");</script>';
                        } else {
                            echo '<script>console.log("Error: ' . $update_quantity_sql . '<br>' . mysqli_error($conn) . '");</script>';
                        }
                    } else {
                        //user console.log to print out the error message
                        echo '<script>console.log("Error: ' . $create_order_detail_sql . '<br>' . mysqli_error($conn) . '");</script>';
                    }
                }

                unset($_SESSION['cart']);
            } else {
                //use console.log to print out the error message
                echo '<script>console.log("Error: ' . $create_order_sql . '<br>' . mysqli_error($conn) . '");</script>';
            }
        } else {

        }




        // go to the dealer_home.html
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../asserts/css/style.css">
</head>

<script>
    function calculateShippingCost() {
        const form = document.getElementById('checkout-form');
        const formData = new FormData(form);
        const shippingMethod = formData.get('shippingmethod');
        const totalWeight = formData.get('total_weight');
        const totalCount = formData.get('total_count');

        const value = (shippingMethod === 'Weight') ? totalWeight : totalCount;
        const url = `http://127.0.0.1:8080/ship_cost_api/${shippingMethod.toLowerCase()}/${value}`;

        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data.result === 'accepted') {
                    const shippingCost = data.cost;
                    const subtotalPrice = formData.get('subtotal_price');
                    const totalPrice = parseFloat(subtotalPrice) + parseFloat(shippingCost);

                    //set the shipping cost and totalprice to hidden tag
                    document.getElementById('hidden-shipping-cost').value = shippingCost;
                    document.getElementById('hidden-total-price').value = totalPrice;

                    //update shipping cost and total price
                    document.getElementById('shipping-cost').textContent = `$${shippingCost}`;
                    document.getElementById('total-price').textContent = `$${totalPrice}`;

                    // able the create order button
                    document.getElementById('create-order-btn').disabled = false;
                } else {
                    alert(data.reason);
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>

<body>
    <!-- Navigation -->
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
                        <a class="nav-link active" aria-current="page" href="dealer_home.html">Home</a>
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
                            <li><a class="dropdown-item" href="Item.php">Order Item</a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="dealer_viewOrder.php">View Order</a></li>
                        </ul>
                    </li>

                </ul>
                <div class="d-flex">
                    <a class="btn btn btn-outline-success m-2" href="./checkout.php" role="button">Checkout</a>
                    <a class="btn btn btn-outline-success m-2" href="./logout.php" role="button">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <!-- right side of checkout -->
            <div class="col-md-4 order-md-2 mb-4" style="margin-top: 25px;">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
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
                        echo "Subtotal: $" . number_format($session_total_price);
                        echo "<br>";
                        echo "Shipping cost: " . "<strong id='shipping-cost'></strong>";
                        echo "<br>";
                        echo "Total price:" . "<strong id='total-price'></strong>";
                    } ?></strong>
                </li>
                </ul>
            </div>
            <!-- left side of checkout -->
            <div class="col-md-8 order-md-1" style="margin-top: 25px;">
                <h4 class="mb-3">Smart & Luxury Motor Company</h4>
                <form class="needs-validation" novalidate method="POST" action="checkout.php" id="checkout-form">
                    <div class="row">
                        <table class="table">
                            <tbody>
                                <?php if (!empty($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        echo "<tr>";
                                        echo "<td><img src=\"" . $value['item_image'] . "\" style='width:50px; height:50px;'></td>";
                                        echo "<td class=\"align-middle\">" . $value['item_name'] . "<br>" . $value['full_product_id'] . "</td>";
                                        echo "<td class=\"align-middle\">" . $value['quantity'] . "</td>";
                                        echo "<td class=\"align-middle\">$" . ($value['price'] * $value['quantity']) . "</td>";
                                        echo "<td> <a href='checkout.php?action=remove&id=" . $value['item_id'] . "'> <button type=\"button\" class=\"btn btn-danger\">Remove</button> </a> </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<h1>Cart is empty</h1>";
                                    echo "<div class='mt-4'>";
                                    echo "<a href='Item.php' class='btn btn-primary'>Add items to cart?</a>";
                                    echo "</div>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <h4 class="mb-3">Shipping method</h4>
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="weightmode" name="shippingmethod" type="radio" class="custom-control-input"
                                required value="Weight" onchange="calculateShippingCost()">
                            <label class="custom-control-label" for="weightmode">By weight</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="quantity" name="shippingmethod" type="radio" class="custom-control-input"
                                required value="Quantity" onchange="calculateShippingCost()">
                            <label class="custom-control-label" for="quantity">By quantity</label>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <input type="hidden" name="total_weight" value="<?php $total_weight = 0;
                    //if cart not null
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total_weight += $value['weight'] * $value['quantity'];
                        }
                        echo $total_weight; ?>">
                        <input type="hidden" name="total_count" value="<?php $total_count = 0;
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total_count += $value['quantity'];
                        }
                        echo $total_count;
                    }
                    ?>">
                    <input type="hidden" name="subtotal_price" value="<?php echo $session_total_price; ?>">
                    <input type="hidden" name="shipping_cost" id="hidden-shipping-cost" value="">
                    <input type="hidden" name="total_price" id="hidden-total-price" value="">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" id="create-order-btn"
                        name="create_order" disabled>Create Order</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'remove') {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['item_id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    echo "<script>window.location = 'checkout.php'</script>";
                }
            }
        } else if ($_GET['action'] == 'clearall') {
            unset($_SESSION['cart']);
            echo "<script>window.location = 'checkout.php'</script>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>