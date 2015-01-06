<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_restoran";
$conn = mysqli_connect($servername, $username, $password,$dbname);
if (! $conn) {
    die("Connection failed: ");
} 
echo "Connected successfully";
?>