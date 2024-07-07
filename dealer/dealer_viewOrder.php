<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../asserts/css/style.css">
  <title>Dealer View Order </title>
</head>

<body >
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
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
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
        <a class="btn btn btn-outline-success" href="./checkout.php" role="button" style="margin-right:15px">Checkout</a>
        <form class="d-flex">
          <button class="btn btn-outline-success" type="button">Logout</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="accordion " id="accordionFlushExample">

    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">

        <button class="accordion-button collapsed  " type="button" data-bs-toggle="collapse"
          data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          <div>
            Order:OrderID<br>
            Manager ID:SalesManagerID<br>
            Manager's Contact Name:Manager'sContactName<br>
            Manager's Contact Number:Manager'sContactNumber<br>
            Order Date & Time:OrderDateTime<br>
            Delivery Address:DeliveryAddress<br>
            Delivery Date:DeliveryDate<br>
            Order Status:OrderStatus<br>
          </div>
        </button>

      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
        data-bs-parent="#accordionFlushExample">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Spare Part Image</th>
              <th scope="col">Spare Part Name</th>
              <th scope="col">Order Quantity</th>
              <th scope="col">Order Price</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>img.link</td>
              <td>car</td>
              <td>999</td>
              <td>999999</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>img.link</td>
              <td>car</td>
              <td>999</td>
              <td>999999</td>
          </tbody>
        </table>
              <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal" >
          Delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this item?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>