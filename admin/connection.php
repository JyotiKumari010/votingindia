<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votingsystem";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Successfully connected";
// Perform queries here
?>