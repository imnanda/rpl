<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("CS"))
{
    redirect('../login.php');

}

$id_kuesioner = $_GET['id_kuesioner'];

$query = "DELETE FROM kuesioner WHERE id_kuesioner = {$id_kuesioner}";
$result = mysqli_query($conn, $query);

alert('Kuesioner berhasil dihapus!');
redirect('../list_kuesioner.php');