<?php
    require_once '../db/connet.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $partNum = $_POST['inputPartNumber'];
        $partCategory = $_POST['inputpartCategory'];
        $partName = $_POST['inputPartname'];
        $imgFile = $_POST['imgFile'];
        $partDescription = $_POST['inputPartdescription'];
        $partWeight = $_POST['inputWeight'];
        $partQty = $_POST['inputQuantity'];
        $partPrice = $_POST['inputPrice'];

        $sql = "INSERT INTO item (item_name, item_image, item_desc, weight, quantity, price, category_id, product_id) VALUES ('$partName', '$imgFile', '$partDescription', '$partWeight', '$partQty', '$partPrice', '$partCategory', '$partNum')";
        if (mysqli_query($conn, $sql)) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        // Close the database connection
        mysqli_close($conn);
    }
?>

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
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">
                <i class="bi bi-x-diamond-fill"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="manager_home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manager_update_record.php">Update Order records</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manager_generate_report.php">Generate Report</i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                    <button class="btn btn-outline-success" type="button">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class=" forms1 col">
                <form method="POST" action="manager_insert_Item.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="inputPartNumber" class="form-label">Part Number</label>
                        <input type="text" class="form-control" id="inputPartNumber">
                    </div>
                    <div class="mb-3">
                        <label for="partCategory" class="form-label">Part Category</label>
                        <input type="text" class="form-control" id="inputpartCategory">
                    </div>
                    <div class="mb-3">
                        <label for="inputPartname" class="form-label">Part Name</label>
                        <input type="text" class="form-control" id="inputPartname">
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
                        <label for="inputWeight" class="form-label">Weight</label>
                        <input type="text" class="form-control" id="inputWeight">
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
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>