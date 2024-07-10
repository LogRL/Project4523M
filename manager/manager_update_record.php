<?php
require_once('../db/connet.php');

$sql = "SELECT `order`.`order_id`, `order_date`, `total_price`, `order_time`, `address`, `delivery_date`, `deal_id`, `order`.`sm_id`, `order_status`, `order_item`.`item_id`, `item`.`item_name`, `item`.`item_image`, `order_item`.`quantity`, `sales_manager`.`contact_name`, `sales_manager`.`contact_num` FROM `order` INNER JOIN `order_item` on `order_item`.`order_id` = `order`.`order_id` INNER JOIN `item` on `item`.`item_id` = `order_item`.`item_id` INNER JOIN `sales_manager` on `sales_manager`.`sm_id` = `order`.`sm_id`;";
$result = mysqli_query($conn, $sql);

if ($result) {
  while ($rs = mysqli_fetch_assoc($result)) {
    $orderId[] = $rs['order_id'];
    $smId[] = $rs['sm_id'];
    $contactName[] = $rs['contact_name'];
    $contactNum[] = $rs['contact_num'];
    $orderDate[] = $rs['order_date'];
    $orderTime[] = $rs['order_time'];
    $address[] = $rs['address'];
    $deliveryDate[] = $rs['delivery_date'];
    $orderStatus[] = $rs['order_status'];
    $itemId[] = $rs['item_id'];
    $quantity[] = $rs['quantity'];
    $itemName[] = $rs['item_name'];
    $itemImage[] = $rs['item_image'];
    $price[] = $rs['total_price'];
    // ... process other columns as needed
  }
} else {
  echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#">
        <i class="bi bi-x-diamond-fill"></i>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="manager_home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="manager_update_record.php">Update Order records</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manager_generate_report.php">Generate Report</i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          <button class="btn btn-outline-success" type="button">Logout</button>
        </form>
      </div>
    </div>
  </nav>
  <?php foreach($orderId as $key => $orderid): $mkey = $key ?> 
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo"$mkey"?>" aria-expanded="false" aria-controls="flush-collapseOne">
        <div><br>
          Order: <?php echo "$orderid"?> <br>
          Manager ID: <?php echo"$smId[$mkey]"?><br>
          Manager's Contact Name: <?php echo"$contactName[$mkey]"?><br>
          Manager's Contact Number: <?php echo"$contactNum[$mkey]"?><br>
          Order Date: <?php echo"$orderDate[$mkey]"?><br>
          Order Time: <?php echo"$orderTime[$mkey]"?><br>
          Delivery Address: <?php echo"$address[$mkey]"?><br>
          Delivery Date: <?php echo"$deliveryDate[$mkey]"?><br>
          Order Status: <?php echo"$orderStatus[$mkey]"?><br><br>
        </div>
      </button>
    </h2>
    <div id="flush-collapse<?php echo"$mkey"?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Spare Part Image</th>
            <th scope="col">Spare Part Name</th>
            <th scope="col">Order Quantity</th>
            <th scope="col">Order Price</th>

          </tr>
        </thead>
        <tbody>
          <?php foreach($itemId as $mykey => $item): $itemCount = $mykey + 1 ?>
          <tr>
            <th scope="row"><?php echo"$itemCount"?> </th>
            <td><div class="col-sm-2 align-self-start"><img src="<?php echo"$itemImage[$mykey]"?>" class="img-fluid rounded-start" alt="..."></div></td>
            <td><?php echo"$itemName[$mykey]"?></td>
            <td><?php echo"$quantity[$mykey]"?></td>
            <td><?php echo"$price[$mykey]"?></td>
          </tr>
          <?php endforeach;?>
        </tbody>

      </table>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="padding-bottom: 15px; padding-right: 15px;">
        <button class="btn btn-primary me-md-2" type="button">Update</button>
        <button class="btn btn-primary" type="button">Reject</button>
      </div>
    </div>
  </div>
  <?php endforeach;?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>