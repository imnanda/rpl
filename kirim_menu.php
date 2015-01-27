<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Koki"))
{
    header("Location:login.php");
    exit();
}
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];
$jenis = $_POST['jenis'];
$status = $_POST['status'];
$id_karyawan = $_SESSION['id_karyawan'];

$sql = "INSERT INTO menu (nama_menu, harga, jenis, status, id_karyawan) VALUES ('$nama_menu', $harga, '$jenis', '$status', $id_karyawan)";
$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);
