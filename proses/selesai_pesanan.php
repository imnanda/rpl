<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pelayan"))
{
    redirect('../login.php');

}

$id_pesanan = $_POST['id_pesanan'];
$nomor_meja = $_POST['nomor_meja'];

$query = "UPDATE pesanan SET status = 'Selesai' WHERE id_pesanan = {$id_pesanan}";
$result = mysqli_query($conn, $query);

$query = "UPDATE meja SET status = 'Tersedia' WHERE nomor_meja = {$nomor_meja}";
$result = mysqli_query($conn, $query);


alert('Pelayanan di meja ' . $nomor_meja . ' selesai!');
redirect('../meja.php');