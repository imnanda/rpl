<?php
include '../includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Koki"))
{
    redirect('../login.php');

}

$id_bahan_baku = $_POST['id_bahan_baku'];
$nama_bahan_baku = $_POST['nama_bahan_baku'];
$qty = $_POST['qty'];

if ($id_bahan_baku == 'new')
{
    $sql = "INSERT INTO bahan_baku(nama_bahan_baku) VALUES ('{$nama_bahan_baku}')";
    $result = mysqli_query($conn, $sql);
    $id_bahan_baku = mysqli_insert_id($conn);
}

$sql = "INSERT INTO permintaan_bahan_baku(qty, status, id_karyawan, id_bahan_baku)
        VALUES ({$qty}, 'Pending', NULL, {$id_bahan_baku})";
$result = mysqli_query($conn, $sql);

if ($result)
{
    alert('Permintaan berhasil disimpan.', 'success');
    redirect('../list_permintaan.php');
}
else
{
    alert('Permintaan gagal disimpan.', 'danger');
    redirect('../list_permintaan.php');
}