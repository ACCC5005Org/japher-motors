<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "japhermotorsdb";
$errors   = array();

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

if (isset($_POST['createCustomer'])) {
    $customerName = $_POST['customerName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    createCustomer($customerName, $phoneNumber, $email);
}

if (isset($_GET['customerId'])) {
    $customerId =  $_GET['customerId'];
    $customer = getCustomerById($customerId);
}


if (isset($_POST['editCustomer'])) {
    $customerName = $_POST['customerName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];

    if (isset($customerId)) {
        editCustomer($customerId, $customerName, $phoneNumber, $email);
    }
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

function createCustomer($customerName, $phoneNumber, $email)
{
    global $conn, $errors;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (empty($customerName)) {
        array_push($errors, "Customer name is required!");
    }

    if (!empty($phoneNumber) && !is_numeric($phoneNumber) && strlen($phoneNumber) != 10) {
        array_push($errors, "Invalid phone number. Please insert only digits. Phone number must have 10 digits!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Missing or invalid email. Please insert a valid email!");
    }

    if (count($errors) == 0) {
        $query = "INSERT INTO customers (customerName, phoneNumber, email) VALUES('$customerName', '$phoneNumber', '$email')";
        if ($conn->query($query) === TRUE) {
            header('location: view.php');
        } else {
            array_push($errors, "Customer was not created. Please contact administrator!");
        }
    }
}

function editCustomer($customerId, $customerName, $phoneNumber, $email)
{
    global $conn, $errors;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (empty($customerName)) {
        array_push($errors, "Customer name is required!");
    }

    if (!empty($phoneNumber) && !is_numeric($phoneNumber) && strlen($phoneNumber) != 10) {
        array_push($errors, "Invalid phone number. Please insert only digits. Phone number must have 10 digits!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Missing or invalid email. Please insert a valid email!");
    }

    if (count($errors) == 0) {
        $query = "UPDATE customers
                  SET customerName = '$customerName',
                      phoneNumber = '$phoneNumber',
                      email = '$email'
                 WHERE customerId = $customerId";
                 
        if ($conn->query($query) === TRUE) {
            header('location: view.php');
        } else {
            array_push($errors, "Error: " . $query . "<br>" . $conn->error);
            array_push($errors, "Customer was not created. Please contact administrator!");
        }
    }
}

function getCustomerById($customerId)
{
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT customerName, phoneNumber, email FROM customers WHERE customerId = '$customerId'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $customer = $result->fetch_assoc();
    }
    return $customer;
}

function display_error()
{
    global $errors;
    if (count($errors) > 0) {
        echo '<div class="alert alert-danger">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}
