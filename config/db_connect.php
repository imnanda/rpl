<?php
$servername = "localhost";
$username = "root";
$password = "02624701363";
$dbname = "db_restoran";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (! $conn) {
    die("Connection failed: ". mysqli_error($conn));
}
