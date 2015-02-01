<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("CS"))
{
    redirect('../login.php');
}

$nama_pengunjung = $_POST['nama_pengunjung'];
$saran = $_POST['saran'];
$waktu_penulisan = $_POST['waktu_penulisan'];

$sql = "INSERT INTO kuesioner (nama_pengunjung, saran, waktu_penulisan, id_karyawan)
        VALUES ('{$nama_pengunjung}', '{$saran}', '{$waktu_pengisian}', {$_SESSION['id_karyawan']})";
$result = mysqli_query($conn, $sql);

if ($result)
{
    alert('Berhasil menyimpan kuesioner.', 'success');
    redirect('../list_kuesioner.php');
}
else
{
    alert('Gagal menyimpan kuesioner.', 'danger');
    redirect('../list_kuesioner.php');
}
