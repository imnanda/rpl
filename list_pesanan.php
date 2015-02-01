<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pelayan"))
{
    header("Location:login.php");
    exit();
}

$sql = "SELECT *
        FROM pesanan
        JOIN karyawan USING (id_karyawan)
        ORDER BY id_pesanan DESC";

$pesanan = getData($sql);

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
        <h1>List Pesanan</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nomor Meja</th>
                <th>Waktu Pemesanan</th>
                <th>Pelayan</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($pesanan as $p) { ?>
            <tr>
                <th scope="row"><?php echo $p['id_pesanan']; ?></th>
                <td><?php echo $p['nomor_meja']; ?></td>
                <td><?php echo date('d-M-y H:i:s', strtotime($p['waktu_pesan'])); ?></td>
                <td><?php echo $p['nama_karyawan']; ?></td>
                <td><?php echo $p['status']; ?></td>
                <td class="text-right"><a class="btn btn-primary btn-sm" href="status_pesanan.php?id_pesanan=<?php echo $p['id_pesanan']; ?>">Lihat Pesanan</a></td>
            </tr>
            <?php } ?>
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