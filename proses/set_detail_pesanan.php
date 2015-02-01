<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Koki"))
{
    redirect('../login.php');

}

$id_detail_pesanan = $_GET['id_detail_pesanan'];
$status = $_GET['status'];

$query = "UPDATE detail_pesanan SET status = '{$status}', id_karyawan = {$_SESSION['id_karyawan']} WHERE id_detail_pesanan = {$id_detail_pesanan}";
$result = mysqli_query($conn, $query);

alert('Pesanan ' . $status . '!');
redirect('../list_detail_pesanan.php?status=masak');
