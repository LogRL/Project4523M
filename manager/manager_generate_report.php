<?php
require_once '../db/connet.php';
$sql = "select item_id, item_name, item_image, item_desc, weight, quantity, price, category_id, LPAD(product_id, 5, 0) as product_id from item, item_category where item.category_id = item_category.categroy_id;";
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
            <a class="nav-link " aria-current="page" href="manager_home.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manager_update_record.php">Update Order records</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="manager_generate_report.php">Generate Report</i></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
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
  <div class="container mt-5">
    <div class="row mb-5">
      <div class="col-sm-6">
        <div class="card border-dark my-2">
          <div class="card-header bg-dark text-light"><h5 class="card-title mt-2">Today Sales</h5></div>
          <div class="card-body">
            <p class="card-text">$99</p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card border-dark my-2">
          <div class="card-header bg-dark text-light"><h5 class="card-title mt-2">Month Sales</h5></div>
          <div class="card-body">
            <p class="card-text">#9999</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-dark" style="width: auto;">
      <div class="card-header bg-dark text-light">
        <h5 class="card-title mt-2">Stocky Selling</h5>
      </div>
      <div class="card-body">
        <p class="card-text">
        <table class="table table-striped table-responsive">
          <thead>
            <tr>
              <th scope="col">Part Number</th>
              <th scope="col">Part Name</th>
              <th scope="col">Part image </th>
              <th scope="col">Total Number</th>
              <th scope="col">Total Sales</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">100001</th>
              <td>sheet Metal</td>
              <td>
                <img src="../asserts/img/sample images/A-Sheet Metal/100001.jpg" width="48" height="48">
              </td>
              <td>100</td>
              <td>$5000</td>
            </tr>
            <tr>
              <th scope="row">200001</th>
              <td>Major Assembilies</td>
              <td>
                <img src="../asserts/img/sample images/B-Major Assemblies/200001.jpg" width="48" height="48">
              </td>
              <td>100</td>
              <td>$5000</td>
            </tr>
          </tbody>
        </table>
        <h1 class="display-5">Total sales amount =$10000 </h1>
        </p>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>