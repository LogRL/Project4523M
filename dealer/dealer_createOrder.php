<?php

require_once ('../db/connet.php');


session_start();
$username = $_SESSION['deal_name'];


if(isset($_GET['add_to_cart'])){
  if(isset($_SESSION['cart'])){
    $session_array_id = array_column($_SESSION['cart'], "item_id");
    if(!in_array($_GET['item_id'], $session_array_id)){
      // Item does not exist, add new item
      $session_array = array(
        "item_id" => $_GET['item_id'],
        "item_name" => $_GET['item_name'],
        "price" => $_GET['price'],
        "quantity" => $_GET['quantity']
      );
      $_SESSION['cart'][] = $session_array;
    } else {
      // Item exists, update quantity
      foreach($_SESSION['cart'] as $key => $value){
        if($value["item_id"] == $_GET['item_id']){
          // Update quantity
          $_SESSION['cart'][$key]['quantity'] += $_GET['quantity'];
          break; // Stop the loop after updating
        }
      }
    }
  } else {
    // Cart does not exist, create new cart and add item
    $session_array = array(
      "item_id" => $_GET['item_id'],
      "item_name" => $_GET['item_name'],
      "price" => $_GET['price'],
      "quantity" => $_GET['quantity']
    );
    $_SESSION['cart'][] = $session_array;
  }
}
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
  <title>Dealer Create Order</title>
</head>

<script>


  function setORder() {
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
              <li><a class="dropdown-item" href="dealer_createOrder.php">Create Order</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="dealer_viewOrder.php">View Order</a></li>
            </ul>
          </li>

        </ul>
     
        <a class="btn btn btn-outline-success" href="./checkout.php" role="button"
          style="margin-right:15px">Checkout</a>
     
 
          <button class="btn btn-outline-success"  type="button">Logout</button>
  
      </div>
    </div>
  </nav>
  <div class="container" style="padding-top:5%;">
    <div class="row">
      <div class="col-sm-8">col-sm-8</div>
      <div class="col-sm-4">col-sm-4</div>
    </div>

    <div class="row row-col-3 ">
      <!-- list of category -->
      <div class="col col-md-3">
        <div class="list-group" id="list-tab" role="tablist">
          <div class="list-outline-item">
            <h3> Categories</h3>
          </div>
          <?php
          $sql = "select * from item_category";
          $result = mysqli_query($conn, $sql);
          while ($rs = mysqli_fetch_array($result)) {
            ?>

            <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list"
              href="#list-<?php echo $rs['category']; ?>" role="tab"
              aria-controls="home"><?php echo $rs['category']; ?></a>

            <?php
          }
          mysqli_free_result($result);

          ?>

          <form method="POST" action="">
            <select name="selectOrder" class="form-select mt-3" aria-label="Default select example"
              onchange="this.form.submit()">
              <option value="" disabled selected>--select--</option>
              <option value="1">ID(Low to High)</option>
              <option value="2">ID(Highb to Low)</option>
              <option value="3">Price(Low to High)</option>
              <option value="4">Price(High to Low)</option>
            </select>
          </form>



        </div>
      </div>

      <!-- card -->
      <?php
      //create a null array call category to store the category
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


              $sql2 = "select * from item,item_category where item.category_id = item_category.categroy_id and item_category.category = '$cate'" . $keyword;
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

                        <form method="GET" action="./dealer_createOrder.php">
                          <h5 class="card-title" name="item_name"><?php echo $rs2['item_name'] ?></h5>
                          <p class="card-text" name="item_desc"><?php echo $rs2['item_desc'] ?></p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                          <input type="hidden" name="item_name" value="<?php echo $rs2['item_name'] ?>">
                          <input type="hidden" name="item_id" value="<?php echo $rs2['item_id'] ?>">
                          <input type="hidden" name="price" value="<?php echo $rs2['price'] ?>">
                          <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                            style="padding-bottom: 15px;padding-right: 15px;">
                            <input type="number" class="form-control" name="quantity" value ="1" min="1">
                            <button type="submit" name="add_to_cart" class="btn btn-primary me-md-2" type="button">Add to
                              cart</button>
                          </div>
                        </form>
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