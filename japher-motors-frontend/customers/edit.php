<?php include('backend-functions.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Japher Motors</title>
    <link rel="stylesheet" href="../styles/bootstrap341.min.css">
    <link rel="stylesheet" href="../styles/main.css">
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
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3>Edit customer</h3>
                            <br>
                            <form method="post">
                                <?php echo display_error(); ?>
                                <div class="form-group">
                                    <label>Customer name</label>
                                    <input name="customerName" type="text" class="form-control" id="customerName" placeholder="Enter name..." value="<?php echo isset($_POST["customerName"]) ? $_POST["customerName"] : (isset($customer) && isset($customer["customerName"]) ?  $customer["customerName"] : '') ; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Phone number</label>
                                    <input name="phoneNumber" type="text" class="form-control" id="customerPhoneNumber" placeholder="Enter phone number..." value="<?php echo isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : (isset($customer) && isset($customer["phoneNumber"]) ?  $customer["phoneNumber"] : '') ; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" id="customerEmail" placeholder="Enter email..." value="<?php echo isset($_POST["email"]) ? $_POST["email"] : (isset($customer) && isset($customer["email"]) ?  $customer["email"] : '') ; ?>">
                                </div>
                                <div class="d-flex justify-content-around">
                                    <button name="editCustomer" type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-default" href="view.php">Cancel</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>