<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "japhermotorsdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$customers = getCustomers();

function getCustomers()
{
    global $conn;
    $customers = array();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT customerId, firstName, lastName FROM customers";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($customers, $row);
        }
    }

    $conn->close();

    return $customers;
}