<?php include('backend-functions.php') ?>
<?php

$userName = $_POST["name"];
$customerId = $_POST["customerId"];

$timeIn = date("Y-m-d\TH:i:s", strtotime($_POST['timeIn']));
$timeOut = date("Y-m-d\TH:i:s", strtotime($_POST['timeOut']));
$bookingNumber = generateRandomString(10);

createBooking($userName, $timeIn, $timeOut, $bookingNumber, $customerId); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>JAPHER MOTORS</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>JAPHER MOTORS</h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#">Customers</a>
                </li>
                <li>
                    <a href="calendar_view.php">Bookings</a>
                </li>
                <li>
                    <a href="../inventory/inventory.php">Inventory</a>
                </li>
                <li>
                    <a href="#">Payments</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="" class="download">Antoci Bianca</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div class="d-flex justify-content-center" id="content">

            <div class="card" style="width: 24rem; height:100%;">
                <div class="card-body">
                    <h3 class=titlePosition>Booking confirmation</h3>
                    <br>
                    <h5 class="card-title">Customer</h5>
                    <div>
                        <?php echo $_POST["name"]; ?>
                    </div>
                    <br>
                    <h5 class="card-title">Date/time in</h5>
                    <div>20/11/2020, 11:50</div>
                    <br>
                    <h5 class="card-title">Date/time out</h5>
                    <div>20/11/2020, 14:30</div>
                    <br>
                    <h5 class="card-title">Booking reference</h5>
                    <div>
                        <?php echo $bookingNumber; ?>
                    </div>
                    <br>
                    <a href="calendar_view.php" class="btn btn-primary">Print</a>
                    <a href="calendar_view.php" class="btn btn-primary">Back to Calendar</a>
                </div>
            </div>

        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>