<?php
include'config/session.php';
include'config/db_connect.php';

if(! is_login() || ! cek_jabatan("Pelayan"))
{
    header("Location:login.php");
    exit();
}
$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))