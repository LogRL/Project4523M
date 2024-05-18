<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./manager_form.css">
    <link rel="stylesheet" href="../asserts/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
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
                <a class="nav-link active" aria-current="page" href="manager_home.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="manager_update_record.php">Update Order records</i></a>
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
                  <li><hr class="dropdown-divider"></li>
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
      <div class="container">
        <div class="row">
            <div class=" forms1 col">
                <form>
                    <div class="mb-3">
                        <label for="inputPartNumber" class="form-label">Part Number</label>
                        <input type="text" class="form-control" id="inputPartNumber">
                    </div>
                    <div class="mb-3">
                        <label for="imgFile" class="form-label">Part Image</label>
                        <input class="form-control" type="file" id="imgFile">
                    </div>
                    <div class="mb-3">
                        <label for="inputPartdescription" class="form-label">Part Description</label>
                        <input type="text" class="form-control" id="inputPartdescription">
                    </div>
                    <div class="mb-3">
                        <label for="inputQuantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="inputQuantity">
                    </div>
                    <div class="mb-3">
                        <label for="inputPrice" class="form-label">Price</label>
                        <input type="text" class="form-control" id="inputPrice">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>