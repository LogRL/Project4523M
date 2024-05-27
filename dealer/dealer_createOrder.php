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
        <form class="d-flex">
          <button class="btn btn-outline-success" type="button">Logout</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container" style="padding-top:5%;">
    <div class="row row-col-3 ">
      <div class="col col-md-3">
        <div class="list-group" id="list-tab" role="tablist">
          <div class="list-outline-item">
            <h3> Categories</h3>
          </div>
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list"
            href="#list-A" role="tab" aria-controls="list-home">
            <h5>Sheet Metal</h5>
          </a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-B"
            role="tab" aria-controls="list-profile">
            <h5>Major Asssemblies</h5>
          </a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-C"
            role="tab" aria-controls="list-messages">
            <h5>Light Components</h5>
          </a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-D"
            role="tab" aria-controls="list-settings">
            <h5>Accessories</h5>
          </a>
        </div>
      </div>
      <div class="col-3 col-md-9">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-A" role="tabpanel" aria-labelledby="list-home-list">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/A-Sheet Metal/100001.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/A-Sheet Metal/100002.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/A-Sheet Metal/100003.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/A-Sheet Metal/100004.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/A-Sheet Metal/100005.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-B" role="tabpanel" aria-labelledby="list-profile-list">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/B-Major Assemblies/200001.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/B-Major Assemblies/200002.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/B-Major Assemblies/200003.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/B-Major Assemblies/200004.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/B-Major Assemblies/200005.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-C" role="tabpanel" aria-labelledby="list-messages-list">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/C-Light Components/300001.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/C-Light Components/300002.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/C-Light Components/300003.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/C-Light Components/300004.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/C-Light Components/300005.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="list-D" role="tabpanel" aria-labelledby="list-settings-list">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/D-Accessories/400001.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/D-Accessories/400002.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/D-Accessories/400003.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/D-Accessories/400004.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="../asserts/img/sample images/D-Accessories/400005.jpg" class="img-fluid rounded-start"
                    alt="...">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                      additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end"
                      style="padding-bottom: 15px;padding-right: 15px;">
                      <button class="btn btn-primary me-md-2" type="button">Add to cart</button>
                    </div>
                  </div>
                </div>
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