<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Kasir"))
{
    redirect('../login.php');
}

$total_biaya = $_POST['total_biaya'];
$diskon = $_POST['diskon'];
$metode_pembayaran = $_POST['metode_pembayaran'];
$id_pesanan = $_POST['id_pesanan'];

$sql = "INSERT INTO pembayaran(total_biaya, diskon, metode_pembayaran, waktu_pembayaran, id_pesanan, id_karyawan)
        VALUES ({$total_biaya}, {$diskon}, '{$metode_pembayaran}', NOW(), {$id_pesanan}, {$_SESSION['id_karyawan']})";
$result = mysqli_query($conn, $sql);

if ($result)
{
    alert('Berhasil membuat pembayaran.', 'success');
    redirect('../list_tagihan.php');
}
else
{
    alert('Gagal membuat pembayaran.', 'danger');
    redirect('../list_tagihan.php');
}
