<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pelayan"))
{
    redirect('../login.php');

}

$nomor_meja = $_POST['nomor_meja'];

$query = "UPDATE meja SET status = 'Tidak Tersedia' WHERE nomor_meja = {$nomor_meja}";
$result = mysqli_query($conn, $query);

$query = "INSERT INTO pesanan(waktu_pesan, nomor_meja, id_karyawan)
              VALUES (NOW(), {$nomor_meja}, {$_SESSION['id_karyawan']})";
$result = mysqli_query($conn, $query);

$id_pesanan = mysqli_insert_id($conn);

foreach ($_POST['qty'] as $k => $qty)
{
    $query = "INSERT INTO detail_pesanan(qty, status, id_pesanan, id_menu, id_karyawan)
              VALUES ({$qty}, 'Pending', {$id_pesanan}, {$k}, NULL)";
    $result = mysqli_query($conn, $query);
}

alert('Pesanan berhasil dicatat!');
redirect('../status_pesanan.php?id_pesanan=' . $id_pesanan);
