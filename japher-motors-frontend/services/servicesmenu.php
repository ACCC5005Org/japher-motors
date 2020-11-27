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

    <!-- CALENDAR DEPENDENCIES -->
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
                    <a href="#">Bookings</a>
                </li>
                <li>
                    <a href="#">Inventory</a>
                </li>
                <li>
                    <a href="#">Payments</a>
                </li>
                <li>
                    <a href="servicesmenu.php">Services</a>
                </li>

            </ul>

        </nav>

        <!-- Page Content  -->
        <div class="d-flex justify-content-center" id="content">

            <div class="card" style="width: 100%; height:100%;">
                <div class="card-body">
                    <h3 class=titlePosition>Services</h3>
                    <br>
                    
                        <h5>
                            <input type="text" placeholder="Search" name="search" id="search" class="form-control"
                            style="width:400px; margin-left:64%; margin-top:-38px;" />

                            <!-- Include bootstrap & jQuery -->
                            <link rel="stylesheet" href="bootstrap.css" />
                            <script src="jquery-3.3.1.min.js"></script>
                            <script src="bootstrap.js"></script>

                            <?php
                            if (isset($_POST["get_data"]))
                            {
                                $id = $_POST["id"];
                                $connection = mysqli_connect("localhost", "root", "", "japhermotorsdb");
                                $sql = "SELECT * FROM services";
                                $result = mysqli_query($connection, $sql);
                                $row = mysqli_fetch_object($result);
                                echo json_encode($row);
                                exit();
                            }
                            ?>
                            <?php
                                // Connecting with database and executing query
                                $connection = mysqli_connect("localhost", "root", "", "japhermotorsdb");
                                $sql = "SELECT * FROM services";
                                $result = mysqli_query($connection, $sql);
                            ?>
                                    
                            

                            <!-- Creating table heading -->
                            <div class="container">
                                <table class="table" style="margin-left:0%; margin-top:10%; width:100%;">
                                <button class = "btn btn-primary" data-toggle = "modal" data-target="#AddserviceModal">
                                            Add service
                                        </button>
                                    <tr>
                                        <th>Services</th>
                                        <th>Action</th>
                                    </tr>

                                    <!-- Display dynamic records from database -->
                                    <?php while ($row = mysqli_fetch_object($result)) { ?>
                                        <tr>
                                            <td><?php echo $row->serviceName; ?></td>
                                    <!--Button to edit service -->
                                    <td>
                                        <button class = "btn btn-primary" data-toggle = "modal" data-target="#EditModal">
                                            Edit
                                        </button>
                                    </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>

                            <!--Edit service Modal -->
                            <div class = "modal fade" id = "EditModal" tabindex = "-1" role = "dialog" aria-hidden = "true">
                            
                                <div class = "modal-dialog">
                                    <div class = "modal-content">
                                        
                                        <div class = "modal-header">
                                            <h4 class = "modal-title">
                                            Edit Service
                                            </h4>

                                            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                                            ×
                                            </button>
                                        </div>
                                        
                                        <div id = "modal-body">
                                        Content
                                        </div>
                                        
                                        <div class = "modal-footer">
                                            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                                            Submit
                                            </button>
                                        </div>
                                        
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <!-- Add service Model -->
                            <div class = "modal fade" id = "AddserviceModal" tabindex = "-1" role = "dialog" aria-hidden = "true">
                            
                                <div class = "modal-dialog">
                                    <div class = "modal-content">
                                        
                                        <div class = "modal-header">
                                            <h4 class = "modal-title">
                                            Add Service
                                            </h4>

                                            <!-- <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                                            ×
                                            </button> -->
                                        </div>
                                        
                                        <div id = "modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Add new service</h5>
                                                <div><input type="text" name="service name" ></div>
                                                <br>
                                                <h5 class="card-title">Car type</h5>
                                                <div><input type="text" name="car type" ></div>
                                                <br>
                                                <h5 class="card-title">Price</h5>
                                                <div><input type="text" name="price" ></div>
                                                <br>
                                                <a href="#" class="btn btn-primary">Create</a>
                                                <a href="servicesmenu.php" class="btn btn-primary">Cancel</a>
                                                <br>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <!-- <div class = "modal-footer">
                                            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
                                            OK
                                            </button>
                                        </div> -->
                                        
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                        </h5>
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

    
    <script>
        function loadData(id) {
            console.log(id);
            $.ajax({
                url: "servicesmenu.php",
                method: "POST",
                data: {get_data: 1, id: id},
                success: function (response) {
                    response = JSON.parse(response);
                    console.log(response);
                    var html = "";

                    // Displaying city
                    html += "<div class='row'>";
                        html += "<div class='col-md-6'>City</div>";
                        html += "<div class='col-md-6'>" + response.city + "</div>";
                    html += "</div>";

                    // And now assign this HTML layout in pop-up body
                    $("#modal-body").html(html);

                    $("#myModal").modal();
                }
            });
        }
    </script>

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