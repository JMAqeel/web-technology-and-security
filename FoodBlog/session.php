<?php
session_start();
if (!isset($_SESSION['sessionID'])) {
    // Redirect the user back to the login page or display an error message
    header("Location: login.php");
    exit();
}