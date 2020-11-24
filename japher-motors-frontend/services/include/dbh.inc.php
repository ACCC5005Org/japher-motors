<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "japhermotorsdb";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// if ($conn->connect_errno) {
//     echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
// }
// echo $conn->host_info . "\n";

?>