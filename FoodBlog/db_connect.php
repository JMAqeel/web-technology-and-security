<?php
$host = "localhost";
$db_username = "zahra";
$db_password = "1234";
$database = "project";
$conn = mysqli_connect($host, $db_username, $db_password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

