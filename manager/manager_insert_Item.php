<?php
require_once '../db/connet.php';

$sql = "SELECT category FROM item_category";
$result = mysqli_query($conn, $sql);

if ($result) {
  $categories = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row['category'];
  }
} else {
  echo 'Error fetching categories: ' . mysqli_error($conn);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $partNum = $_POST['inputPartNumber'] ?? '';
  $partCategory = $_POST['inputPartCategory'] ?? '';
  $partName = $_POST['inputPartName'] ?? '';
  $partDescription = $_POST['inputPartDescription'] ?? '';
  $partWeight = $_POST['inputWeight'] ?? '';
  $partQty = $_POST['inputQuantity'] ?? '';
  $partPrice = $_POST['inputPrice'] ?? '';
  //set the file name
  $uploadDir = '';
  $filePrefix = '';
  switch ($partCategory) {
    case '1':
      $uploadDir = '../asserts/img/A-Sheet Metal/';
      $filePrefix = '10000';
      break;
    case '2':
      $uploadDir = '../asserts/img/B-Major Assemblies/';
      $filePrefix = '20000';
      break;
    case '3':
      $uploadDir = '../asserts/img/C-Light Components/';
      $filePrefix = '30000';
      break;
    case '4':
      $uploadDir = '../asserts/img/D-Accessories/';
      $filePrefix = '40000';
      break;
    default:
      $uploadDir = '../asserts/img/others/';
      break;
  }
  //upload the file and change the name
  if (isset($_FILES['imgFile']) && $_FILES['imgFile']['error'] == UPLOAD_ERR_OK) {
    $fileExtension = pathinfo($_FILES['imgFile']['name'], PATHINFO_EXTENSION);
    $newFileName = $filePrefix . $partNum . '.' . $fileExtension;
    $imgFile = $uploadDir . $newFileName;
    move_uploaded_file($_FILES['imgFile']['tmp_name'], $imgFile);
  } else {
    $imgFile = '';
  }

  // check if upload successful
  if ($partNum && $partCategory && $partName && $partDescription && is_numeric($partWeight) && is_numeric($partQty) && is_numeric($partPrice)) {
    $sql = "INSERT INTO item (item_id, item_name, item_image, item_desc, weight, quantity, price, category_id, product_id) VALUES (NULL, '$partName', '$imgFile', '$partDescription', '$partWeight', '$partQty', '$partPrice', '$partCategory', '$partNum')";
    if (mysqli_query($conn, $sql)) {
    
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  } else {
    echo "Invalid data provided.";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="btn btn-outline-success m-2" role="button" href="./logout.php">Logout</a>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="forms1 col">
        <form method="POST" action="manager_insert_Item.php" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="inputPartNumber" class="form-label">Part Number</label>
            <input type="text" class="form-control" id="inputPartNumber" name="inputPartNumber">
          </div>
          <div class="mb-3">
            <label for="inputPartCategory" class="form-label">Part Category</label>
            <select class="form-select" id="inputPartCategory" name="inputPartCategory">
              <option selected>Choose...</option>
              <?php
              foreach ($categories as $key => $category) {
                $mykey = $key + 1;
                echo "<option value='$mykey'>$category</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="inputPartName" class="form-label">Part Name</label>
            <input type="text" class="form-control" id="inputPartName" name="inputPartName">
          </div>
          <div class="mb-3">
            <label for="imgFile" class="form-label">Part Image</label>
            <input class="form-control" type="file" id="imgFile" name="imgFile">
          </div>
          <div class="mb-3">
            <label for="inputPartDescription" class="form-label">Part Description</label>
            <input type="text" class="form-control" id="inputPartDescription" name="inputPartDescription">
          </div>
          <div class="mb-3">
            <label for="inputWeight" class="form-label">Weight</label>
            <input type="text" class="form-control" id="inputWeight" name="inputWeight">
          </div>
          <div class="mb-3">
            <label for="inputQuantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="inputQuantity" name="inputQuantity">
          </div>
          <div class="mb-3">
            <label for="inputPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="inputPrice" name="inputPrice">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>