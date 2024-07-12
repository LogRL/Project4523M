<?php

require_once ('../db/connet.php');

session_start();
$username = $_SESSION['deal_name'];

// if (isset($_GET['add_to_cart'])) {
//   if (isset($_SESSION['cart'])) {
//     $session_array_id = array_column($_SESSION['cart'], "item_id");
//     if (!in_array($_GET['item_id'], $session_array_id)) {
//       // Item does not exist, add new item
//       $session_array = array(
//         "item_id" => $_GET['item_id'],
//         "item_name" => $_GET['item_name'],
//         "item_image" => $_GET['item_image'],
//         "item_desc" => $_GET['item_desc'],
//         "weight" => $_GET['weight'],
//         "quantity" => $_GET['quantity'],
//         "price" => $_GET['price'],
//         "full_product_id" => $_GET['category_id'] . $_GET['product_id']
//       );
//       $_SESSION['cart'][] = $session_array;
//     } else {
//       // Item exists, update quantity
//       foreach ($_SESSION['cart'] as $key => $value) {
//         if ($value["item_id"] == $_GET['item_id']) {
//           // Update quantity
//           $_SESSION['cart'][$key]['quantity'] += $_GET['quantity'];
//           break; // Stop the loop after updating
//         }
//       }
//     }
//   } else {
//     // Cart does not exist, create new cart and add item
//     $session_array = array(
//       "item_id" => $_GET['item_id'],
//       "item_name" => $_GET['item_name'],
//       "item_image" => $_GET['item_image'],
//       "item_desc" => $_GET['item_desc'],
//       "weight" => $_GET['weight'],
//       "quantity" => $_GET['quantity'],
//       "price" => $_GET['price'],
//       "full_product_id" => $_GET['category_id'] . $_GET['product_id']

//     );
//     $_SESSION['cart'][] = $session_array;
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
  <title>Dealer Create Order</title>
</head>

<script>
  function addtocart(item_id, item_name, item_image, item_desc, weight, price, category_id, product_id) {
    // Use fetch post to addtocart.php
    const url = "http://localhost/Project4523M/dealer/addtocart.php";
    quantity = document.getElementsByName("quantity-" + item_id)[0].value;
    const data = {
      item_id: item_id,
      item_name: item_name,
      item_image: item_image,
      item_desc: item_desc,
      weight: weight,
      quantity: quantity,
      price: price,
      category_id: category_id,
      product_id: product_id
    };
    fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    }).then(response => {
      if (response.ok) {
        showToast(category_id + product_id);
      }
    }).catch(error => {
      console.error('Error:', error);
    });
  }

  function showToast(product_id) {
    const toastElement = document.getElementById('liveToast');
    //add item id to the toast
    toastElement.querySelector('.toast-body').innerHTML = "Product " + product_id + " added to cart successfully!";
    var toast = new bootstrap.Toast(toastElement, { autohide: true, delay: 3000 });
    toast.show();
  }

  function linktotag(category) {
    // Go to the id place
    if (category == "home") {
      window.location.href = "Item.php";
    } else {
      window.location.href = "#list-" + category;
    }
  }

  function setOrder() {
    var x = document.getElementById("selectOrder").value;
    keyword = "";
    if (x == 1) {
      keyword = "order by item_id asc";
    } else if (x == 2) {
      keyword = "order by item_id desc";
    } else if (x == 3) {
      keyword = "order by price asc";
    } else if (x == 4) {
      keyword = "order by price desc";
    }
  }
</script>

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
            <a class="nav-link" aria-current="page" href="dealer_home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dealer_UpdateInfo.php">User Info</i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Order
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="Item.php">Create Order</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="dealer_viewOrder.php">View Order</a></li>
            </ul>
          </li>
        </ul>
        <div class="d-flex">
          <a class="btn btn btn-outline-success m-2" href="./checkout.php" role="button"
            >Checkout</a>
          <a class="btn btn btn-outline-success m-2" href="./logout.php" role="button">Logout</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container" style="padding-top:5%;">
    <div class="row row-col-3">
      <!-- list of category -->
      <div class="col col-md-3">
        <div class="list-group" id="list-tab" role="tablist">
          <div class="list-outline-item">
            <h3>Categories</h3>
          </div>
          <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-home"
            role="tab" aria-controls="home" onclick="linktotag('home')">All</a>
          <?php
          $sql = "select * from item_category";
          $result = mysqli_query($conn, $sql);
          while ($rs = mysqli_fetch_array($result)) {
            ?>
            <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
              href="#list-<?php echo $rs['category']; ?>" role="tab" aria-controls="home"
              onclick="linktotag('<?php echo $rs['category']; ?>')"><?php echo $rs['category']; ?></a>
            <?php
          }
          mysqli_free_result($result);
          ?>
          <form method="POST" action="">
            <select name="selectOrder" class="form-select mt-3" aria-label="Default select example"
              onchange="this.form.submit()">
              <option value="" disabled selected>--select--</option>
              <option value="1">ID (Low to High)</option>
              <option value="2">ID (High to Low)</option>
              <option value="3">Price (Low to High)</option>
              <option value="4">Price (High to Low)</option>
            </select>
          </form>
        </div>
      </div>

      <!-- card -->
      <?php
      $category = array();
      $sql = "select * from item_category";
      $result = mysqli_query($conn, $sql);
      while ($rs = mysqli_fetch_array($result)) {
        array_push($category, $rs['category']);
      }
      mysqli_free_result($result);
      ?>
      <div class="col-3 col-md-9">
        <div class="tab-content" id="nav-tabContent">
          <?php
          foreach ($category as $cate) {
            ?>
            <h1><?php echo $cate ?></h1>
            <div class="tab-pane fade show active" id="list-<?php echo $cate ?>" role="tabpanel"
              aria-labelledby="list-home-list">
              <?php
              $keyword = "";
              if (isset($_POST['selectOrder'])) {
                $country = $_POST['selectOrder'];
                if ($country == 1) {
                  $keyword = "order by item_id asc";
                } else if ($country == 2) {
                  $keyword = "order by item_id desc";
                } else if ($country == 3) {
                  $keyword = "order by price asc";
                } else if ($country == 4) {
                  $keyword = "order by price desc";
                }
              }
              $sql2 = "select item_id, item_name, item_image, item_desc, weight, quantity, price, category_id, LPAD(product_id, 5, 0) as product_id from item, item_category where item.category_id = item_category.categroy_id and item_category.category = '$cate' " ." and quantity > 0 " . $keyword;
              $result2 = mysqli_query($conn, $sql2);
              while ($rs2 = mysqli_fetch_array($result2)) {
                ?>
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="<?php echo $rs2['item_image'] ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title" name="item_nametext"><?php echo $rs2['item_name'] ?></h5>
                        <p class="card-text"><small class="text-muted">Product ID:
                            <?php echo $rs2['category_id'] . $rs2['product_id'] ?></small></p>
                        <p class="card-text" name="item_desctext">Item Description: <?php echo $rs2['item_desc'] ?></p>
                        <p class="card-text" name="item_desctext">Price: $<?php echo $rs2['price'] ?></p>
                        <p class="card-text">Weight: <?php echo $rs2['weight'] ?>kg</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                          style="padding-bottom: 15px; padding-right: 15px;">
                          <input type="number" class="form-control" name="quantity-<?php echo $rs2['item_id'] ?>" value="1"
                            min="1" max="<?php echo $rs2['quantity'] ?>">
                          <button id="liveToastBtn" name="add_to_cart" class="btn btn-primary me-md-2" type="button"
                            onclick="addtocart(
                            '<?php echo $rs2['item_id'] ?>',
                            '<?php echo $rs2['item_name'] ?>',
                            '<?php echo $rs2['item_image'] ?>',
                            '<?php echo $rs2['item_desc'] ?>',
                            '<?php echo $rs2['weight'] ?>',  
                            '<?php echo $rs2['price'] ?>',
                            '<?php echo $rs2['category_id'] ?>',
                            '<?php echo $rs2['product_id'] ?>')">
                            Add to cart</button>
                          <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
                              <div class="toast-header">
                                <img src="../asserts/img/cat_like_meme.jpg" class="rounded me-2" style="width:15.99px;height:15.99px">
                                <strong class="me-auto">Notification</strong>
                                <small>Just now</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                              </div>
                              <div class="toast-body">
                                Item added to cart successfully!
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              mysqli_free_result($result2);
              ?>
            </div>
            <?php
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