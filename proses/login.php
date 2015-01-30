<?php
include '../includes/db_connect.php';
include '../includes/session.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT username, id_karyawan, nama_karyawan, jabatan FROM user JOIN karyawan USING (id_karyawan) WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Tidak dapat mengeksekusi query " . mysqli_error($conn);
    exit;
}

if (mysqli_num_rows($result) == 0) {
    echo "Password dan username salah!";
    exit;
}

$user = mysqli_fetch_assoc($result);

$_SESSION['username'] = $user["username"];
$_SESSION['login'] = true;
$_SESSION['id_karyawan'] = $user["id_karyawan"];
$_SESSION['nama_karyawan'] = $user["nama_karyawan"];
$_SESSION['jabatan'] = $user["jabatan"];


switch(strtolower($user['jabatan']))
{
    case 'pelayan' : $location = "../meja.php";
    break;

    case 'kasir' : $location = "../kasir.php";
    break;

    case 'koki' : $location = "../listmenu.php";
    break;

    case 'pantry' : $location = "../listpantry.php";
    break;

    case 'admin' : $location = "admin.php";
    break;


}

header("Location:".$location);