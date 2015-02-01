<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("CS"))
{
    redirect('../login.php');
}

$id_kuesioner = $_POST['id_kuesioner'];
$nama_pengunjung = $_POST['nama_pengunjung'];
$saran = $_POST['saran'];
$waktu_penulisan = $_POST['waktu_penulisan'];

$sql = "UPDATE kuesioner
        SET nama_pengunjung = '{$nama_pengunjung}',
            saran = '{$saran}',
            waktu_penulisan = '{$waktu_penulisan}'
        WHERE id_kuesioner = {$id_kuesioner}";
$result = mysqli_query($conn, $sql);

if ($result)
{
    alert('Berhasil mengubah kuesioner.', 'success');
    redirect('../list_kuesioner.php');
}
else
{
    alert('Gagal mengubah kuesioner.', 'danger');
    redirect('../list_kuesioner.php');
}
