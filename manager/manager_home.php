<?php
require_once '../db/connect.php';
mysqli_query($conn, "SET SESSION sql_mode=(SELECT REPLACE(@@SESSION.sql_mode,'ONLY_FULL_GROUP_BY',''))");

$sql = "select `order`.order_id ,order_item.item_id, order_item.quantity from `order`,order_item where `order`.order_id = order_item.order_id and order_status = 'accepted'";
$result = mysqli_query($conn, $sql);
if ($result) {
  $order_items = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $order_items[] = $row;
  }
} else {
  echo 'Error fetching order items: ' . mysqli_error($conn);
}
  //get today sales
  $sql = "select * from `order` where order_status = 'accepted' and order_date = CURDATE()";
  $result = mysqli_query($conn, $sql);
  while($rc = mysqli_fetch_assoc($result)){
    //save in array
    $order_todays[] = $rc;
    // echo $rc['order_id'];
  }
  //count the total sales of today
  $total_sales_today = 0;
  //if the order  today is not empty
  if(!empty($order_todays)){
    foreach ($order_todays as $order_today) {
      $order_id = $order_today['order_id'];
      $sql = "select sum(item.price*order_item.quantity) as total from order_item ,item where order_item.item_id = item.item_id and order_id = $order_id";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $total = mysqli_fetch_assoc($result);
        $total_sales_today += $total['total'];
      } else {
        
      }
    }
  }


  //count the total sales of this month
  $sql = "select * from `order` where order_status = 'accepted' and month(order_date) = month(CURDATE())";
  $result = mysqli_query($conn, $sql);
  while($rc = mysqli_fetch_assoc($result)){
    //save in array
    $order_months[] = $rc;
    // echo $rc['order_id'];
  }
  //count the total sales of this month
  $total_sales_month = 0;
  //if the order  this month is not empty
  if(!empty($order_months)){
    foreach ($order_months as $order_month) {
      $order_id = $order_month['order_id'];
      $sql = "select sum(item.price*order_item.quantity) as total from order_item ,item where order_item.item_id = item.item_id and order_id = $order_id";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $total = mysqli_fetch_assoc($result);
        $total_sales_month += $total['total'];
      } else {
        
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
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
            <a class="nav-link " aria-current="page" href="manager_home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manager_update_record.php">Update Order records</i></a>
          </li>
 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Item
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="manager_insert_Item.php">Insert Item</a></li>
              <li><a class="dropdown-item" href="manager_edit_Item.php">Edit Item</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="manager_delete_Item.php">Delete Item</a></li>
            </ul>
          </li>

        </ul>
        <form class="d-flex">
          <a class="btn btn-outline-success m-2" href="./logout.php" role="button">Logout</a>
        </form>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row mb-5">
      <div class="col-sm-6">
        <div class="card border-dark my-2">
          <div class="card-header bg-dark text-light"><h5 class="card-title mt-2">Today Sales</h5></div>
          <div class="card-body">
            <p class="card-text">$<?php 
              echo   $total_sales_today;
            ?></p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card border-dark my-2">
          <div class="card-header bg-dark text-light"><h5 class="card-title mt-2">Month Sales</h5></div>
          <div class="card-body">
            <p class="card-text">$<?php 
              echo $total_sales_month
            ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-dark" style="width: auto;">
      <div class="card-header bg-dark text-light">
        <h5 class="card-title mt-2">Stocky Selling</h5>
      </div>
      <div class="card-body">
        <p class="card-text">
        <table class="table table-striped table-responsive">
          <thead>
            <tr>
              <th scope="col">Part Number</th>
              <th scope="col">Part Name</th>
              <th scope="col">Part image </th>
              <th scope="col">Total Number</th>
              <th scope="col">Total Sales</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              foreach ($order_items as $order_item) {
                $item_id = $order_item['item_id'];
                $quantity = $order_item['quantity'];
                $sql = "select category_id, LPAD(product_id,5,'0') as product_id,item_name,item_image,price from item where item_id = $item_id";
         
                $result = mysqli_query($conn, $sql);
                
                if ($result) {
            
                  $item = mysqli_fetch_assoc($result);
                  $item_image = $item['item_image'];
                  $part_number = $item['category_id'] . $item['product_id'];
                  echo "<tr>";
                  echo "<td>" . $part_number. "</td>";
                  echo "<td>" . $item['item_name'] . "</td>";
                  echo "<td><img src='$item_image' alt='part image' width='100' height='100'></td>";
                  echo "<td>" . $quantity . "</td>";
                  echo "<td>" . $item['price'] * $quantity . "</td>";
                  echo "</tr>";
        
                } else {
                  echo 'Error fetching item: ' . mysqli_error($conn);
                }
              }
              ?>

            </tr>
           
          </tbody>
        </table>
        <h1 class="display-5">
          Total Sales:$<?php
          $total_sales = 0;
          foreach ($order_items as $order_item) {
            $item_id = $order_item['item_id'];
            $quantity = $order_item['quantity'];
            $sql = "select price from item where item_id = $item_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              $item = mysqli_fetch_assoc($result);
              $total_sales += $item['price'] * $quantity;
            } else {
              echo 'Error fetching item: ' . mysqli_error($conn);
            }
          }
          echo $total_sales;
          ?>
        </h1>
        </p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>