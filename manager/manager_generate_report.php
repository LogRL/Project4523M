<?php
require_once '../db/connet.php';

$sql = "SELECT `order_item`.`order_id`, `order_item`.`item_id`, `order_item`.`quantity`, `item`.`item_id`, `item`.`item_name`, `item`.`item_image`, `item`.`price`, `item`.`category_id`, LPAD(product_id, 5, 0) AS `product_id` FROM `item`, `order_item`, `item_category`, `order` WHERE `item`.`category_id` = `item_category`.`categroy_id` AND `item`.`item_id` = `order_item`.`item_id` AND `order`.`order_status` = 'accepted' GROUP BY `order_item`.`item_id` ORDER BY `order_item`.`item_id` ASC;";
$result = mysqli_query($conn, $sql);

if ($result){
  while ($rs = mysqli_fetch_assoc($result)){
    $orderId[] = $rs['order_id'];
    $itemId[] = $rs['item_id'];
    $quantity[] = $rs['quantity'];
    $itemName[] = $rs['item_name'];
    $itemImage[] = $rs['item_image'];
    $price[] = $rs['price'];
    $categoryId[] = $rs['category_id'];
    $productId[] = $rs['product_id'];
  }
}
else{
  echo "Error: " . mysqli_error($conn);
}

$sql1 = "SELECT `order_status`, `order_date` FROM `order` ";

mysqli_close($conn);
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
            <a class="nav-link " aria-current="page" href="manager_home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manager_update_record.php">Update Order records</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="manager_generate_report.php">Generate Report</i></a>
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
            <p class="card-text">$99</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card border-dark my-2">
          <div class="card-header bg-dark text-light"><h5 class="card-title mt-2">Month Sales</h5></div>
          <div class="card-body">
            <p class="card-text">#9999</p>
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
            <?php foreach($itemId as $key => $id): $mykey = $key?>
            <tr>
              <th scope="row"><?php echo"$categoryId[$key]$productId[$key]";?></th>
              <td><?php echo"$itemName[$key]";?></td>
              <td>
                <img src="<?php echo"$itemImage[$key]";?>" width="48" height="48">
              </td>
              <td><?php
                $totalQuantity = 0;
                $ckey = 0;
                While($ckey < count($itemId)){
                  if($id == $itemId[$ckey]){
                    $totalQuantity += $quantity[$ckey];
                  }
                  $ckey++;
                }
                echo $totalQuantity;
              ?>
              </td>
              <td><?php
                $totalSales = 0;
                $countKey = 0;
                while($countKey < count($itemId)){
                  if($id == $itemId[$countKey]){
                    $totalSales = $price[$countKey] * $quantity[$countKey];
                  }
                  $countKey++;
                }
                echo $totalSales;
              ?>
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        <h1 class="display-5"><?php
          $totalSales = 0;
          $countKey = 0;
          while($countKey < count($itemId)){
            $totalSales += $price[$countKey] * $quantity[$countKey];
            $countKey++;
          }
          echo "Total sales amount = $totalSales";
        ?></h1>
        </p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>