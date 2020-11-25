<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "japhermotorsdb";

$conn = new mysqli($servername, $username, $password, $dbname);

$bookings = getBookings();
$services = getServices();

function getServices()
{
    global $conn;
    $services = array();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $query = "SELECT * FROM `services`";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($services, $row);
            }
        }
    }


    return $services;
}

function getBookings()
{
    global $conn;
    $bookings = array();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $query = "SELECT BOOKING.datetimeIn, BOOKING.datetimeOut, CUSTOMER.customerName FROM bookings AS BOOKING, customers AS CUSTOMER WHERE CUSTOMER.customerId = BOOKING.customerId";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($bookings, $row);
            }
        }
    }


    return $bookings;
}

function createBooking($name, $timeIn, $timeOut, $bookingNumber)
{
    global $conn;
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "insert into bookings(customerId, datetimeIn, datetimeOut, bookingReference) values (1, '$timeIn', '$timeOut' , '$bookingNumber')";

    $conn->query($query);
    return "DONE";
}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
