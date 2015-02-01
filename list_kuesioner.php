<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("CS"))
{
    header("Location:login.php");
    exit();
}

$sql = "SELECT * FROM kuesioner JOIN karyawan USING (id_karyawan) ORDER BY id_kuesioner DESC";
$kuesioner = getData($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootswatch.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/ respond.min.js"></script>
    <![endif]-->
</head>
<body role="document">
    <?php include "components/header.php"; ?>
    <div class="container theme-showcase" role="main">
        <?php include "components/alert.php"; ?>
        <div class="row">
            <div class="col-xs-8">
                <h1>Daftar Kuesioner</h1>
            </div>
            <div class="col-xs-4 text-right">
                <div class="height"></div>
                <a href="tambah_kuesioner.php" class="btn btn-success">Isi Kuesioner</a>
            </div>
        </div>

        <div class="height"></div>
        <!-- Table -->
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama Pengunjung</th>
                <th>Saran</th>
                <th>Waktu Penulisan</th>
                <th>Penginput</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($kuesioner as $row)
            {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['nama_pengunjung']; ?></td>
                    <td><?php echo $row['saran']; ?></td>
                    <td><?php echo date('d-M-y', strtotime($row['waktu_penulisan'])); ?></td>
                    <td><?php echo $row['nama_karyawan']; ?></td>
                    <td style="width:140px; text-align: right">
                        <a href="edit_kuesioner.php?id_kuesioner=<?php echo $row['id_kuesioner']; ?>" class="btn
                               btn-success btn-sm">Edit</a>
                        <a href="proses/hapus_kuesioner.php?id_kuesioner=<?php echo $row['id_kuesioner']; ?>" class="btn
                               btn-warning btn-sm" onclick="return confirm('Anda Ingin Menghapus')" >Hapus</a>
                    </td>
                </tr>
                <?php
                $i++;}
            ?>
            </tbody>
        </table>
    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script>
        $(function () {

        });
    </script>
</body>
</html>