<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pantry"))
{
    redirect('../login.php');

}

$id_permintaan = $_GET['id_permintaan'];

$query = "UPDATE permintaan_bahan_baku SET status = 'Dibeli', id_karyawan = {$_SESSION['id_karyawan']} WHERE id_permintaan = {$id_permintaan}";
$result = mysqli_query($conn, $query);

alert('Permintaan sudah dibeli!');
redirect('../list_permintaan_pantry.php');
