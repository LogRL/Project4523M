<?php
session_start();

require_once ('../db/connet.php');
$username = $_SESSION['deal_name'];
$sql = "SELECT * FROM user WHERE deal_name = '$username'";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
$pwd = $rs['pwd'];
$contact_num = $rs['contact_num'];
$email = $rs['email'];
$fax_num = $rs['fax_num'];
$address = $rs['address'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Update Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="form.css">
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
            <a class="nav-link" aria-current="page" href="dealer_home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">User Info</i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="<php ?" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
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
        <form class="d-flex">
          <button class="btn btn-outline-success" type="button">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container" style=" background:url('../asserts/img/bg.jpeg')no repeat fixed;">
    <div class="row align-items-center">
      <div class="forms1 col" style="margin-top: 10%;">
        <form>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Old Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">New Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Re enter the new Password</label>
            <input type="password" class="form-control" id="exampleInputPassword3.">
          </div>

          <div class="mb-3">
            <label for="exampleInputContactNum" class="form-label">Contact Number</label>
            <input type="ContactNum" class="form-control" id="exampleInputContactNum"
              placeholder="<?php echo $contact_num ?>">
          </div>

          <div class="mb-3">
            <label for="exampleInputFaxNum" class="form-label">Fax Number</label>
            <input type="InputFaxNum" class="form-control" id="exampleInputFaxNum" placeholder="<?php echo $fax_num ?>">
          </div>

          <div class="mb-3">
            <label for="exampleInputDeliveryAddress" class="form-label">Delivery Address</label>
            <input type="DeliveryAddress" class="form-control" id="exampleInputDeliveryAddress"
              placeholder="<?php echo $address ?>">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="forms2 col" style="margin-top: 10%;">
        <form>
          <div class="mb-3">
            <div class="img-box">
              <img src="../asserts/img/popcat2.jpg" alt="">
            </div>
          </div>
          <fieldset disabled>
            <div class="mb-3 disabledInput">
              <label for="UserName" class="form-label">User Name</label>
              <input type="UserName" class="form-control" id="exampleInputUserName"
                placeholder="<?php echo $username ?>">
            </div>

            <div class="mb-3 disabledInput">
              <label for="exampleInputEmail" class="form-label"></label>
              <input type="Email" class="form-control" id="exampleInputEmail" placeholder="<?php echo $email ?>">
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>