<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "japhermotorsdb";

$conn
 = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}
echo "Connected succesfuly!";


?>
