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
                <form>
                    <div class="mb-3">
                        <label for="inputPartnumber" class="form-label">Part Number</label>
                        <input type="text" class="form-control" id="inputPartnumber">
                    </div>
                    <div class="mb-3">
                        <label for="inputrePartnumber" class="form-label">Re enter the Part Number</label>
                        <input type="text" class="form-control" id="inputrePartnumber">
                    </div>
                    <div class="d-grid gap-2 d-md-block">
                        <button type="reset " class="btn btn-primary" type="button">Reset</button>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Submit
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this item?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">



        </script>
</body>

</html>