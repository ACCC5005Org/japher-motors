<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "japhermotorsdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_SESSION['searchCustomerValue'])) {
    $searchedCustomer = $_SESSION['searchCustomerValue'];
}

if (isset($_SESSION['searchCustomerValue']) || isset($_POST['searchCustomerInput'])) {

    if (isset($_POST['searchCustomerInput'])) {
        $searchedCustomer = $_POST['searchCustomerInput'];
        $_SESSION['searchCustomerValue'] = $searchedCustomer;
    }
    $customers = searchCustomer($searchedCustomer);

} else {
    $customers = getCustomers();
}


function searchCustomer($searchedCustomer)
{
    global $conn;
    $customers = array();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $searchedCustomer = $searchedCustomer;
    $query = "SELECT customerId, customerName FROM customers WHERE customerName like '%$searchedCustomer%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($customers, $row);
        }
    }

    return $customers;
}

function getCustomers()
{
    global $conn;
    $customers = array();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $query = "SELECT customerId, customerName FROM customers";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($customers, $row);
        }
    }

    return $customers;
}
