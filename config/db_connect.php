<?php
$servername = "localhost";
$username = "root";
$password = "asdasd150494";
$dbname = "db_restoran";
$conn = mysqli_connect($servername, $username, $password,$dbname);
if (! $conn) {
    die("Connection failed: ");
}
