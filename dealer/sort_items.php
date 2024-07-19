<?php
require_once ('../db/connet.php');

$data = json_decode(file_get_contents('php://input'), true);
$order = $data['order'];

$category = array();
$sql = "select * from item_category";
$result = mysqli_query($conn, $sql);
while ($rs = mysqli_fetch_array($result)) {
  array_push($category, $rs['category']);
}
mysqli_free_result($result);

$html = '';

foreach ($category as $cate) {
  $html .= "<h1>" . $cate . "</h1>";
  $html .= "<div class='tab-pane fade show active' id='list-" . $cate . "' role='tabpanel' aria-labelledby='list-home-list'>";
  $sql2 = "select item_id, item_name, item_image, item_desc, weight, quantity, price, category_id, LPAD(product_id, 5, 0) as product_id from item, item_category where item.category_id = item_category.categroy_id and item_category.category = '$cate' and quantity > 0 " . $order;
  $result2 = mysqli_query($conn, $sql2);
  while ($rs2 = mysqli_fetch_array($result2)) {
    $html .= "
    <div class='card mb-3'>
      <div class='row g-0'>
        <div class='col-md-4'>
          <img src='" . $rs2['item_image'] . "' class='img-fluid rounded-start' alt='...'>
        </div>
        <div class='col-md-8'>
          <div class='card-body'>
            <h5 class='card-title' name='item_nametext'>" . $rs2['item_name'] . "</h5>
            <p class='card-text'><small class='text-muted'>Product ID: " . $rs2['category_id'] . $rs2['product_id'] . "</small></p>
            <p class='card-text' name='item_desctext'>Item Description: " . $rs2['item_desc'] . "</p>
            <p class='card-text' name='item_desctext'>Price: $" . $rs2['price'] . "</p>
            <p class='card-text'>Weight: " . $rs2['weight'] . "kg</p>
            <div class='d-grid gap-2 d-md-flex justify-content-md-end' style='padding-bottom: 15px; padding-right: 15px;'>
              <input type='number' class='form-control' name='quantity-" . $rs2['item_id'] . "' value='1' min='1' max='" . $rs2['quantity'] . "'>
              <button id='liveToastBtn' name='add_to_cart' class='btn btn-primary me-md-2' type='button'
                onclick='addtocart(
                \"" . $rs2['item_id'] . "\",
                \"" . $rs2['item_name'] . "\",
                \"" . $rs2['item_image'] . "\",
                \"" . $rs2['item_desc'] . "\",
                \"" . $rs2['weight'] . "\",
                \"" . $rs2['price'] . "\",
                \"" . $rs2['category_id'] . "\",
                \"" . $rs2['product_id'] . "\")'>
                Add to cart</button>
            </div>
          </div>
        </div>
      </div>
    </div>";
  }
  mysqli_free_result($result2);
  $html .= "</div>";
}

echo json_encode(['html' => $html]);
?>