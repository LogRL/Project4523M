<?php
require_once '../db/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item_id = $_POST["inputItemID"];
  $partImage = $_FILES["imgFile"]["name"];
  $partImageTmp = $_FILES["imgFile"]["tmp_name"];
  $partDescription = $_POST["inputPartdescription"];
  $quantity = $_POST["inputQuantity"];
  $price = $_POST["inputPrice"];

  // check type of item
  $itemType = $_POST["itemType"];
  switch ($itemType) {
    case 'sheet metal':
      $uploadDir = '../asserts/img/A-Sheet Metal/';
      break;
    case 'Major Assemblies':
      $uploadDir = '../asserts/img/B-Major Assemblies/';
      break;
    case 'Light Components':
      $uploadDir = '../asserts/img/C-Light Components/';
      break;
    case 'Accessories':
      $uploadDir = '../asserts/img/D-Accessories/';
      break;

  }
  //get the old image
  $sql = "SELECT item_image FROM item WHERE item_id = '$item_id'";
  $result = mysqli_query($conn, $sql);
  if ($row = mysqli_fetch_assoc($result)) {
    $oldImage = $row['item_image'];
    // delete the old image
    if (file_exists($oldImage)) {
        unlink($oldImage);
    }
    //upload new image
    $newImagePath = $uploadDir . basename($partImage);
    move_uploaded_file($partImageTmp, $newImagePath);

    // update database record
    $sql = "UPDATE item SET item_image = '$newImagePath', item_desc = '$partDescription', quantity = '$quantity', price = '$price' WHERE item_id = '$item_id'";
    if (mysqli_query($conn, $sql)) {
        // echo "Item updated successfully";
    } else {
        // echo "Error updating item: " . mysqli_error($conn);
    }
  } else {
    // echo "Item not found";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./manager_form.css">

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
            <a class="nav-link " aria-current="page" href="manager_home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manager_update_record.php">Update Order records</i></a>
          </li>
  
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
  <div class="container">
    <div class="row">
      <div class="forms1 col">
        <form method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="inputItemID" class="form-label">Item ID</label>
            <input type="text" class="form-control" id="inputItemID" name="inputItemID" required>
          </div>
          <div class="mb-3">
            <label for="imgFile" class="form-label">Part Image</label>
            <input class="form-control" type="file" id="imgFile" name="imgFile" required>
          </div>
          <div class="mb-3">
            <label for="inputPartdescription" class="form-label">Part Description</label>
            <input type="text" class="form-control" id="inputPartdescription" name="inputPartdescription" required>
          </div>
          <div class="mb-3">
            <label for="inputQuantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="inputQuantity" name="inputQuantity" required>
          </div>
          <div class="mb-3">
            <label for="inputPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="inputPrice" name="inputPrice" required>
          </div>
          <div class="mb-3">
            <label for="itemType" class="form-label">Item Type</label>
            <select class="form-select" id="itemType" name="itemType" required>
              <option value="sheet metal">Sheet Metal</option>
              <option value="Major Assemblies">Major Assemblies</option>
              <option value="Light Components">Light Components</option>
              <option value="Accessories">Accessories</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>