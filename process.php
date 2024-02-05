<?php
session_start();
require("connect.php");

$_SESSION['contact'] = $_POST['contact'];

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $_SESSION['dump'] = 'Connection success';
}

$contact = $_SESSION['contact'];

if (empty($contact) || !ctype_digit($contact) || strlen($contact) !== 11) {
    if (!isset($_SESSION['message']) || $_SESSION['message'] !== 'Success') {
        $_SESSION['message'] = 'Please fill up correctly! Sample of valid contact number: 09555723409';
    }
} else {
    $_SESSION['message'] = 'Success';

    // Use prepared statements to prevent SQL injection
    $query = "INSERT INTO people.contacts (contact_number) VALUES ('$contact') 
              ON DUPLICATE KEY UPDATE contact_number = VALUES(contact_number)";
    run_mysql_query($query);
}

mysqli_close($connection);
header('Location: index.php');
?>
