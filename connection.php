<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodie";
$conn = new mysqli($servername, $username, $password, $dbname,4306);
$date = date("Y-m-d H:i:s");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection Successful - Timestamp: " . $date;
?>