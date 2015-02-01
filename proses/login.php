<?php
include '../includes/includes.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT username, id_karyawan, nama_karyawan, jabatan FROM user JOIN karyawan USING (id_karyawan) WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0)
{
    alert("Username atau password salah!", 'warning');
    redirect('../login.php');
}

$user = mysqli_fetch_assoc($result);

$_SESSION['username'] = $user["username"];
$_SESSION['login'] = true;
$_SESSION['id_karyawan'] = $user["id_karyawan"];
$_SESSION['nama_karyawan'] = $user["nama_karyawan"];
$_SESSION['jabatan'] = $user["jabatan"];


switch (strtolower($user['jabatan']))
{
    case 'pelayan' :
        $location = "../meja.php";
        break;

    case 'koki' :
        $location = "../list_menu.php";
        break;

    case 'pantry' :
        $location = "../list_permintaan_pantry.php";
        break;

    case 'kasir' :
        $location = "../list_tagihan.php";
        break;

    case 'cs' :
        $location = "../list_kuesioner.php";
        break;

    case 'admin' :
        $location = "admin.php";
        break;
}

header("Location:" . $location);