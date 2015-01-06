<?php
include'../config/db_connect.php';
$username = $_POST['username'];
$password = $_POST['password'];
echo "$username";
echo "$password";

$sql = "SELECT username, password FROM user WHERE  username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Tidak dapat mengeksekusi query " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "Password dan username salah!";
    exit;
}
?>