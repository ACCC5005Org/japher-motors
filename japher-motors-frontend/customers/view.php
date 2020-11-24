<?php include('backend-functions.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Japher Motors</title>
    <link rel="stylesheet" href="./styles/bootstrap341.min.css">
    <link rel="stylesheet" href="./styles/main.css">
    <script src="./scripts/jquery171.min.js"></script>
    <script src="./scripts/view.js"></script>
</head>

<body>
    <div id="header-container" class="row">
        <div id="header" class="col-md-12">JAPHER MOTORS</div>
    </div>
    <div id="main-container" class="row">
        <div class="col-md-3" id="menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="view.php">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../booking_flow/calendar_view.php">Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
            </ul>
        </div>
        <div id="content-container" class="col-md-9">
            <div class="row">
                <div class="col-md-2">
                    <a class="btn btn-primary" href="create.php">Add customer</a>
                </div>
                <div class="col-md-7"></div>
                <div class="col-md-3">
                    <form name="searchCustomer" method="POST" class="form-inline d-flex justify-content-center md-form form-sm mt-0">
                        <input id="searchCustomerInput" name="searchCustomerInput" class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search customer name" aria-label="Search" value="<?php echo (isset($searchedCustomer)) ? $searchedCustomer : ''; ?>">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($customers as $value) : ?>
                        <div id="row-container" class="row">
                            <div class="col-md-9">
                                <p>
                                    <strong><a href="visits.php?customerId=<?php echo $value['customerId']; ?>"><?php echo $value["customerName"]; ?></a></strong>
                                </p>
                                <?php
                                $lastVisit = getLastVisit($value["customerId"]);
                                echo isset($lastVisit) ? '<p>Last visit on ' . $lastVisit . '</p>' : '';
                                ?>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-2">
                                        <a class="btn btn-primary" href="edit.php?customerId=<?php echo $value['customerId']; ?>">Edit</a>
                                    </div>
                                    <div class="col-md-2" id="<?php echo $value['customerId'] ?>">
                                        <button class="btn btn-danger deleteBtn">Delete</button>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</body>

</html>