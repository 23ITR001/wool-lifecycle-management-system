<?php  
session_start(); // Start the session
include 'db_connect.php'; 

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
