<?php
require_once ('../db/connet.php');
SESSION_START();

$status = $_POST['status'];

//根據狀態過濾訂單
if ($status == 'All') {
  $order_detail_sql = "SELECT * FROM `order` WHERE deal_id = '" . $_SESSION['deal_id'] . "'";
} else {
  $order_detail_sql = "SELECT * FROM `order` WHERE deal_id = '" . $_SESSION['deal_id'] . "' AND order_status = '" . $status . "'";
}

$order_detail_result = mysqli_query($conn, $order_detail_sql);
$array_order = array();
while ($order_detail_rs = mysqli_fetch_assoc($order_detail_result)) {
  $array_order['order'][] = $order_detail_rs;
}

//輸出訂單HTML片段
if (!empty($array_order['order'])) {
  foreach ($array_order['order'] as $key => $value) {
    echo '<div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapse' . $value['order_id'] . '" aria-expanded="false"
          aria-controls="flush-collapse' . $value['order_id'] . '">
          <div>
            Order ID:' . $value['order_id'] . '<br>
            Order Status:' . $value['order_status'] . '<br>
          </div>
        </button>
      </h2>
      <div id="flush-collapse' . $value['order_id'] . '" class="accordion-collapse collapse"
        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="card-header px-4 py-5">
          <h5 class="text-muted mb-0">Thanks for your Order</h5>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
          <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
          <p class="small text-muted mb-0">Receipt Voucher : ' . $value['order_id'] . '</p>
        </div>
        <div class="d-flex justify-content-between pt-2">
          <p class="fw-bold mb-0">Order Details</p>
          <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span> $' . $value['total_price'] . '</p>
        </div>
        <table class="table table-striped" id="order_item_table-' . $value['order_id'] . '">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Spare Part Image</th>
              <th scope="col">Spare Part Name</th>
              <th scope="col" onclick="sortTableBySparePartId(' . $value['order_id'] . ')">Spare Part ID</th>
              <th scope="col">Order Quantity</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>';
    
    $get_order_item_sql = "SELECT order_item.quantity , item.item_name , item.item_image, item.price, item.category_id, LPAD(product_id,5,'0') as product_id FROM order_item JOIN item ON order_item.item_id = item.item_id WHERE order_id = '" . $value['order_id'] . "'";
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
    echo "</tbody></table></div></div></div>";
  }
}
?>