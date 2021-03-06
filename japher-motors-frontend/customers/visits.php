<?php include('backend-functions.php') ?>

<!DOCTYPE html>
<html>

<head>
    <title>Japher Motors</title>
    <link rel="stylesheet" href="./styles/bootstrap341.min.css">
    <link rel="stylesheet" href="./styles/main.css">
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
                    <a class="nav-link" href="../inventory/inventory.php">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../payments/Payments.html">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../services/servicesmenu.php">Services</a>
                </li>
            </ul>
        </div>
        <div id="content-container" class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-default" href="view.php">Back</a>
                    <h3>Visits</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Booking reference</th>
                                <th scope="col">Date/Time In</th>
                                <th scope="col">Date/Time Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($visits as $value) : ?>
                                <tr>
                                    <td><?php echo $value["bookingReference"]; ?></td>
                                    <td><?php echo $value["dateTimeIn"]; ?></td>
                                    <td><?php echo $value["dateTimeOut"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

</html>