<?php
session_start();
require_once ('../db/connect.php');
$username = $_SESSION['deal_name'];

$id = $_SESSION['deal_id'];
$contact_num = $_SESSION['contact_num'];
$fax_num = $_SESSION['fax_num'];
$address = $_SESSION['address'];

if (isset($_POST['update_password'])) {
  $old_password = $_POST['old_password'];
  $new_password = $_POST['new_password'];
  $re_new_password = $_POST['re_new_password'];
  $new_contact_num = $_POST['contact_num'];
  $new_fax_num = $_POST['fax_num'];
  $new_address = $_POST['address'];

  // Update only if old password is provided
  if (!empty($old_password)) {
    $sql_getpassword = "SELECT pwd FROM user WHERE deal_id='$id'";
    $result = mysqli_query($conn, $sql_getpassword);
    $rs = mysqli_fetch_array($result);
    $pwd = $rs['pwd'];

    // Check if the old password matches
    if ($old_password === $pwd) {
      // Check if new passwords match
      if ($new_password === $re_new_password) {
        // Update password in the database
        $update_password_query = "UPDATE user SET pwd='$new_password' WHERE deal_id='$id'";
        mysqli_query($conn, $update_password_query);
        echo "<script>alert('Password updated successfully.');</script>";
      } else {
        echo "<script>alert('New passwords do not match.');</script>";
      }
    } else {
      echo "<script>alert('Old password is incorrect.');</script>";
    }
  }

  // Update contact number if provided
  if (!empty($new_contact_num) && is_numeric($new_contact_num)) {
    $update_contact_num_query = "UPDATE user SET contact_num='$new_contact_num' WHERE deal_id='$id'";
    mysqli_query($conn, $update_contact_num_query);
    $_SESSION['contact_num'] = $new_contact_num;
    echo "<script>alert('Contact Number Update Successful')</script>";
  }

  // Update fax number if provided
  if (!empty($new_fax_num)) {
    $update_fax_num_query = "UPDATE user SET fax_num='$new_fax_num' WHERE deal_id='$id'";
    mysqli_query($conn, $update_fax_num_query);
    $_SESSION['fax_num'] = $new_fax_num;
    echo "<script>alert('Fax Number Update Successful')</script>";

  }

  // Update address if provided and within length limit
  if (!empty($new_address) && strlen($new_address) <= 200) {
    $update_address_query = "UPDATE user SET address='$new_address' WHERE deal_id='$id'";
    mysqli_query($conn, $update_address_query);
    $_SESSION['address'] = $new_address;
    echo "<script>alert('Address Number Update Successful')</script>";

  }
  //refresh the page
  echo "<script>location.href = 'dealer_UpdateInfo.php';</script>";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="form.css">
</head>

<body>
  <!-- Navigation Bar -->
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
            <a class="nav-link active" href="#">User Info</a>
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

  <div class="container" style="background:url('../asserts/img/bg.jpeg')no-repeat fixed;">
    <div class="row align-items-center">
      <!-- Form for updating info -->
      <div class="forms1 col" style="margin-top: 10%;">
        <form action="" method="POST">
          <div class="mb-3">
            <label for="old_password" class="form-label">Old Password</label>
            <input type="password" class="form-control" id="old_password" name="old_password" >
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" >
          </div>
          <div class="mb-3">
            <label for="re_new_password" class="form-label">Re-enter New Password</label>
            <input type="password" class="form-control" id="re_new_password" name="re_new_password" >
          </div>
          <div class="mb-3">
            <label for="contact_num" class="form-label">Contact Number</label>
            <input type="text" class="form-control" id="contact_num" name="contact_num"
              placeholder="<?php echo $contact_num ?>">
          </div>
          <div class="mb-3">
            <label for="fax_num" class="form-label">Fax Number</label>
            <input type="text" class="form-control" id="fax_num" name="fax_num" placeholder="<?php echo $fax_num ?>">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Delivery Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="<?php echo $address ?>">
          </div>
          <button type="submit" class="btn btn-primary" name="update_password">Submit</button>
        </form>
      </div>
      <!-- Form for displaying info that cant edit -->
      <div class="forms2 col" style="margin-top: 10%;">
        <form>
          <div class="mb-3">
            <div class="img-box">
              <img src="../asserts/img/popcat2.jpg" alt="">
            </div>
          </div>
          <fieldset disabled>
            <div class="mb-3 disabledInput">
              <label for="exampleInputUserName" class="form-label">User Name</label>
              <input type="text" class="form-control" id="exampleInputUserName" placeholder="<?php echo $username ?>">
            </div>
            <div class="mb-3 disabledInput">
              <label for="exampleInputEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail"
                placeholder="<?php echo $_SESSION['email'] ?>">
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