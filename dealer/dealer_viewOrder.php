<?php
require_once ('../db/connect.php');
SESSION_START();

//get order details  from id
$order_detail_sql = "select * from `order` where deal_id = '" . $_SESSION['deal_id'] . "'";
$order_detail_result = mysqli_query($conn, $order_detail_sql);
// use while looop to get all order details and put into array order as dictionary
while ($order_detail_rs = mysqli_fetch_assoc($order_detail_result)) {
  $array_order_detail = array(
    "order_id" => $order_detail_rs['order_id'],
    "order_date" => $order_detail_rs['order_date'],
    "order_time" => $order_detail_rs['order_time'],
    "address" => $order_detail_rs['address'],
    "delivery_date" => $order_detail_rs['delivery_date'],
    "deal_id" => $order_detail_rs['deal_id'],
    "sm_id" => $order_detail_rs['sm_id'],
    "order_status" => $order_detail_rs['order_status'],
    "total_price" => $order_detail_rs['total_price'],
    "shipping_cost" => $order_detail_rs['shipping_cost'],
    "shipping_method" => $order_detail_rs['shipping_method']

  );
  $array_order['order'][] = $array_order_detail;
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['cancel_order'])) {
    //change the order status to cancel and add the order_item quantity back to item quantity
    $cancel_order_sql = "update `order` set order_status = 'cancel' where order_id = '" . $_POST['order_id'] . "'";
    $cancel_order_result = mysqli_query($conn, $cancel_order_sql);
    $get_order_item_sql = "select * from order_item where order_id = '" . $_POST['order_id'] . "'";
    $get_order_item_result = mysqli_query($conn, $get_order_item_sql);
    while ($get_order_item_rs = mysqli_fetch_assoc($get_order_item_result)) {
      $get_item_quantity_sql = "select quantity from item where item_id = '" . $get_order_item_rs['item_id'] . "'";
      $get_item_quantity_result = mysqli_query($conn, $get_item_quantity_sql);
      $get_item_quantity_rs = mysqli_fetch_assoc($get_item_quantity_result);
      $new_quantity = $get_item_quantity_rs['quantity'] + $get_order_item_rs['quantity'];
      $update_item_quantity_sql = "update item set quantity = '" . $new_quantity . "' where item_id = '" . $get_order_item_rs['item_id'] . "'";
      $update_item_quantity_result = mysqli_query($conn, $update_item_quantity_sql);
    }
    header("Refresh:0");
  }
}
//


//print all order details in foreach
// if(!empty($array_order['order'])){
//   foreach($array_order['order'] as $key => $value){
//     //echo all order details
//     echo "order_id: ".$value['order_id']."<br>";
//     echo "order_date: ".$value['order_date']."<br>";
//     echo "order_time: ".$value['order_time']."<br>";
//     echo "address: ".$value['address']."<br>";
//     echo "delivery_date: ".$value['delivery_date']."<br>";
//     echo "deal_id: ".$value['deal_id']."<br>";
//     echo "sm_id: ".$value['sm_id']."<br>";
//     echo "order_status: ".$value['order_status']."<br>";
//     echo "total_price: ".$value['total_price']."<br>";
//     echo "shipping_cost: ".$value['shipping_cost']."<br>";
//     echo "shipping_method: ".$value['shipping_method']."<br>";

//   }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../asserts/css/style.css">
  <title>Dealer View Order </title>
</head>
<script>

  let sortDirection = {}; // Object to keep track of sort direction for each table

  function sortTableBySparePartId(id, row) {
    let table = document.getElementById("order_item_table-" + id);
    let rows = Array.from(table.rows).slice(1); // Skip the header row
    let direction = sortDirection[id] || 'asc'; // Default to ascending

    rows.sort((a, b) => {
      let x = a.getElementsByTagName("TD")[row].innerHTML.toLowerCase();
      let y = b.getElementsByTagName("TD")[row].innerHTML.toLowerCase();
      if (direction === 'asc') {
        return x > y ? 1 : -1;
      } else {
        return x < y ? 1 : -1;
      }
    });

    rows.forEach(row => table.tBodies[0].appendChild(row)); // Re-order the rows in the table

    // Toggle the sort direction
    sortDirection[id] = direction === 'asc' ? 'desc' : 'asc';
  }

  function OrderStatusChange(status) {
    // Send AJAX request to fetch orders based on status
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "fetch_orders.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Update the order list with the response
        document.getElementById("accordionFlushExample").innerHTML = xhr.responseText;
      }
    };
    xhr.send("status=" + status);
  }
</script>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="z-index:1021;">
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
            <a class="nav-link active" aria-current="page" href="dealer_home.html">Home</a>
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
  <div class="container " style="padding-top:5%;">
    <div class="row row-col-3">
      <!-- space place -->
      <div class="col col-md-3">
        <div class="sticky-top" style="padding-top:50%">
          <div class="list-group" id="list-tab" role="tablist">
            <div class="list-outline-item">
              <h3>Order Status</h3>
            </div>
            <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" role="tab"
              aria-controls="home" onclick="OrderStatusChange('All')">All</a>
            <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" role="tab"
              aria-controls="home" onclick="OrderStatusChange('waiting to process')">Waiting to process</a>
            <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" role="tab"
              aria-controls="home" onclick="OrderStatusChange('accepted')">Accepted</a>
            <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" role="tab"
              aria-controls="home" onclick="OrderStatusChange('rejected')">Rejected</a>
            <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" role="tab"
              aria-controls="home" onclick="OrderStatusChange('Cancel')">Cancel</a>
          </div>
        </div>
      </div>
      <!-- Order list page -->
      <div class="col-3 col-md-9">
        <div class="accordion accordion-flush" id="accordionFlushExample">

          <?php
          if (!empty($array_order['order'])) {
            foreach ($array_order['order'] as $key => $value) {

              ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">

                  <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapse<?php echo $value['order_id'] ?>" aria-expanded="false"
                    aria-controls="flush-collapse<?php echo $value['order_id'] ?>">
                    <div>
                      Order ID:<?php echo $value['order_id'] ?><br>
                      Order Status:<?php echo $value['order_status'] ?><br>
                    </div>
                  </button>

                </h2>
                <div id="flush-collapse<?php echo $value['order_id'] ?>" class="accordion-collapse collapse"
                  aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="card-header px-4 py-5">
                    <h5 class="text-muted mb-0">Thanks for your Order</h5>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                    <p class="small text-muted mb-0">Receipt Voucher : <?php echo $value['order_id'] ?></p>
                  </div>
                  <div class="d-flex justify-content-between pt-2">
                    <p class="fw-bold mb-0">Order Details</p>
                    <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> $<?php echo $value['total_price'] ?>
                    </p>
                  </div>
                  <?php
                  //An order can only be deleted at least two days before the delivery date.
                  //get today date
                  $today = date("Y-m-d");
                  // echo "today: " . $today . "<br>";
                  //get delivery date
                  $delivery_date = $value['delivery_date'];
                  // echo "delivery_date: " . $delivery_date . "<br>";
                  //if today is less than 2 days before delivery date, then the order can not be deleted
                  $date1 = strtotime($today);
                  // echo "date1: " . $date1 . "<br>";
                  $date2 = strtotime($delivery_date);
                  // echo "date2: " . $date2 . "<br>";
                  //cal the difference between today and delivery date
                  $diff = $date2 - $date1;
                  // echo "diff: " . $diff . "<br>";
                  $days = $diff / (60 * 60 * 24);
                  // echo "days: " . $days . "<br>";
                  //if the difference is less than 2 days, then the order can not be deleted

                  if ($value['order_status'] == "waiting to process" && $days > 2) {

                    ?>
                    <div class="d-flex justify-content-end m-2">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal<?php echo $value['order_id'] ?>">
                        Cancel Order
                      </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $value['order_id'] ?>" tabindex="-1"
                      aria-labelledby="exampleModalLabel<?php echo $value['order_id'] ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel<?php echo $value['order_id'] ?>">Cancel Confirm</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to cancel this order?
                          </div>
                          <form method="POST" action="">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                              <input type="hidden" name="order_id" value="<?php echo $value['order_id'] ?>">
                              <button type="submit" name="cancel_order" class="btn btn-primary">Yes</button>
                            </div>
                          </form>
                        </div>
                      </div>

                    </div>
                    <?php
                  } else {

                  }
                  ?>


                  <table class="table table-striped table-hover" id="order_item_table-<?php echo $value['order_id'] ?>">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Spare Part Image</th>
                        <th scope="col" onclick="sortTableBySparePartId(<?php echo $value['order_id'] ?>,2)">Spare Part Name</th>
                        <th scope="col" onclick="sortTableBySparePartId(<?php echo $value['order_id'] ?>,3)">Spare Part ID
                        </th>
                        <th scope="col">Order Quantity</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $get_order_item_sql = "select order_item.quantity , item.item_name , item.item_image, item.price, item.category_id, LPAD(product_id,5,'0') as product_id from order_item join item on order_item.item_id = item.item_id where order_id = '" . $value['order_id'] . "'";
                      $get_order_item_result = mysqli_query($conn, $get_order_item_sql);
                      $count = 1;
                      while ($get_order_item_rs = mysqli_fetch_assoc($get_order_item_result)) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $count . "</td>";
                        echo "<td><img src='" . $get_order_item_rs['item_image'] . "' alt='item image' style='width:50px;height:50px;'></td>";
                        echo "<td>" . $get_order_item_rs['item_name'] . "</td>";
                        echo "<td>" . $get_order_item_rs['category_id'] . $get_order_item_rs['product_id'] . "</td>";
                        echo "<td>" . $get_order_item_rs['quantity'] . "</td>";
                        echo "<td>" . $get_order_item_rs['price'] . "</td>";
                        echo "</tr>";
                        $count++;
                      }
                      echo "<div class = mg-2>";
                      echo "order_date: " . $value['order_date'] . "<br>";
                      echo "order_time: " . $value['order_time'] . "<br>";
                      echo "address: " . $value['address'] . "<br>";
                      echo "delivery_date: " . $value['delivery_date'] . "<br>";
                      echo "deal_id: " . $value['deal_id'] . "<br>";

                      echo "total_price: " . $value['total_price'] . "<br>";
                      echo "shipping_cost: " . $value['shipping_cost'] . "<br>";
                      echo "shipping_method: " . $value['shipping_method'] . "<br>";
                      if ($value['order_status'] == "Packing") {
                        echo "sm_id: " . $value['sm_id'] . "<br>";
                      } else {

                      }
                      echo "</div>";
                      ?>
                    </tbody>

                  </table>

                  <!-- Button trigger modal -->
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>