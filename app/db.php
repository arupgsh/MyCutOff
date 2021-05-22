<?php
#-- Connection db to input
$servername = "localhost";
$username = "mysql_user";
$password = "password";
$dbname = "mydname";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
