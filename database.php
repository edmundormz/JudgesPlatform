<?php 



$db_host = '127.0.0.1';
$db_username = 'root';
$db_password = '1nnovati0nGDC';
$db_name = 'InnovationWeek18';




$conn=mysqli_connect( $db_host, $db_username, $db_password,"$db_name");

// search submission ID
// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

?>
