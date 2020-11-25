<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>JAPHER MOTORS</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!--Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php require_once 'process.php';?>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>JAPHER MOTORS</h4>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="../customers/view.php">Customers</a>
                </li>
                <li>
                    <a href="../booking_flow/calendar_view.php">Bookings</a>
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
    </div>
    <!-- Page Content  -->
    <a type="button" name="additem" class="btn btn-primary" style="margin-left:28%; margin-top:70px;"
        data-toggle="modal" data-target="#exampleModal">Add Items</a>
    <input type="text" placeholder="Search" name="search" id="search" class="form-control"
        style="width:400px; margin-left:54%; margin-top:-38px;" />
    <?php
    $conn= mysqli_connect("localhost","root","","japhermotorsdb");
    $result=$conn->query("SELECT * FROM inventory") or die($conn->error);
    $query1="SELECT * FROM inventory ORDER BY sparePartId DESC";
    $result1=mysqli_query($conn, $query1);
    ?>
    <table class="table" name="datatable" id="datatable" style="margin-left:28%; margin-top:10%; width:47%;">
        <thead>
            <tr>
                <th scope="col">Part Id</th>
                <th scope="col">Part Name</th>
                <th scope="col">Car Type</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <?php while ($row = $result->fetch_assoc()):?>
        <tbody>
            <tr id="tr1" name="tr1">
                <td><?php echo $row['sparePartId'];?></td>
                <td><?php echo $row['sparePartName'];?></td>
                <td><?php echo $row['carType'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['price'];?></td>
                <td>
                    <button type="button" class="btn btn-success editbtn">Edit</button>
                    <a href="process.php?delete=<?php echo $row['sparePartId'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
        <?php endwhile; ?>

    </table>


    <?php
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
    <!-- ADD POP UP FORM -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="process.php" id="insert_form">
                        <div class="input-field">
                            <table class="table table-bordered" id="table_field">
                                <tr>
                                    <th>Part Name</th>
                                    <th>CarType</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Add or Remove</th>
                                </tr>
                                <tr>
                                    <td><input class="corm-control" type="text" name="sparePartName[]" required="">
                                    </td>
                                    <td><input class="corm-control" type=" text" name="carType[]" required=""></td>
                                    <td><input class="corm-control" type="text" name="quantity[]" required=""></td>
                                    <td><input class="corm-control" type="text" name="price[]" required=""></td>
                                    <td><input class="btn btn-success" type="button" name="add" id="add" value="Add">
                                    </td>
                                </tr>
                            </table>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" id="save" class="btn btn-primary" value="Save">Save</button>


                </div>
            </div>
            </form>


        </div>
    </div>
    <!-- #####################################################################################################################################################################-->if
    <!-- EDIT POP UP FORM -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="process.php" id="insert_form">
                        <div class="input-field">
                            <table class="table table-bordered" id="table_field">
                                <tr>
                                    <th>Part Name</th>
                                    <th>CarType</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                <tr>
                                    <input class="corm-control" id="sparePartId" type="hidden" name="sparePartId"
                                        required="">
                                    <td><input class="corm-control" id="sparePartName" type="text" name="sparePartName"
                                            required=""></td>
                                    <td><input class="corm-control" id="carType" type=" text" name="carType"
                                            required=""></td>
                                    <td><input class="corm-control" id="quantity" type="text" name="quantity"
                                            required=""></td>
                                    <td><input class="corm-control" id="price" type="text" name="price" required>
                                    </td>

                                </tr>
                            </table>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" id="update" class="btn btn-primary"
                        value="Update">Update</button>
                </div>
            </div>
            </form>


        </div>
    </div>
    <!--#####################################################################################################################################################################-->

    <div id="content-container" class="container">
        <div class="row">
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>



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
    <script>
    $(document).ready(function() {
        var html =
            '<tr><td><input class="corm-control" type="text" name="sparePartName[]" required=""></td><td><input class="corm-control" type="text" name="carType[]" required=""></td><td><input class="corm-control" type="text" name="quantity[]" required=""></td><td><input class="corm-control" type="text" name="price[]" required=""></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';


        var max = 5;
        var x = 1;
        $("#add").click(function() {
            if (x <= max) {
                $("#table_field").append(html);
                x++;
            }
        });
        $("#table_field").on('click', '#remove', function() {
            $(this).closest('tr').remove();
            x--;
        });
    });
    </script>

    <script>
    $(document).ready(function() {

        $('.editbtn').on('click', function() {

            $('#editmodal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#sparePartId').val(data[0]);
            $('#sparePartName').val(data[1]);
            $('#carType').val(data[2]);
            $('#quantity').val(data[3]);
            $('#price').val(data[4]);


        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            search_table($(this).val());
        });

        function search_table(value) {
            $('#datatable #tr1').each(function() {
                var found = 'false';
                $(this).each(function() {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
                if (found == 'true') {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
    </script>
</body>