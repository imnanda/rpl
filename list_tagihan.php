<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Kasir"))
{
    header("Location:login.php");
    exit();
}

switch ($_GET['status'])
{
    case 'all' :
        $sql = "SELECT *
                FROM pesanan
                JOIN karyawan USING (id_karyawan)
                LEFT JOIN pembayaran USING (id_pesanan)
                ORDER BY id_pesanan DESC";
        break;

    case 'dibayar' :
        $sql = "SELECT *
                FROM pesanan
                JOIN karyawan USING (id_karyawan)
                JOIN pembayaran USING (id_pesanan)
                ORDER BY id_pesanan DESC";
        break;

    default :
        $sql = "SELECT *
                FROM pesanan
                JOIN karyawan USING (id_karyawan)
                LEFT JOIN pembayaran USING (id_pesanan)
                WHERE id_pembayaran IS NULL
                ORDER BY id_pesanan DESC";
        break;
}

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
        <div class="row">
            <div class="col-xs-8">
                <h1>Daftar Pesanan</h1>
            </div>
            <div class="col-xs-4 text-right">
                <div class="height"></div>
            </div>
        </div>

        <div class="height"></div>
        <!-- Table -->
        <ul class="nav nav-tabs">
            <li role="presentation" class="<?php if ( ! isset($_GET['status'])) echo 'active'; ?>"><a
                    href="list_tagihan.php">Daftar Pesanan Belum Dibayar</a></li>
            <li role="presentation" class="<?php if ($_GET['status'] == "dibayar") echo 'active'; ?>"><a
                    href="?status=dibayar">Daftar Pesanan Dibayar</a></li>
            <li role="presentation" class="<?php if ($_GET['status'] == "all") echo 'active'; ?>"><a href="?status=all">Daftar
                    Semua Pesanan</a></li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nomor Meja</th>
                <th>Waktu Pemesanan</th>
                <th>Pelayan</th>
                <th>Status Pelayanan</th>
                <th>Status Pembayaran</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pesanan as $p)
            { ?>
                <tr>
                    <th scope="row"><?php echo $p['id_pesanan']; ?></th>
                    <td><?php echo $p['nomor_meja']; ?></td>
                    <td><?php echo date('d-M-y H:i:s', strtotime($p['waktu_pesan'])); ?></td>
                    <td><?php echo $p['nama_karyawan']; ?></td>
                    <td><?php echo $p['status']; ?></td>
                    <td><?php if ($p['id_pembayaran']) echo 'Dibayar (Rp. ' . ($p['total_biaya'] - $p['diskon'] + ($p['total_biaya'] - $p['diskon']) * 0.1)  . ')';
                        else echo 'Belum membayar'; ?></td>
                    <td class="text-right">
                        <?php if ( ! $p['id_pembayaran'])
                        { ?>
                            <a class="btn btn-primary btn-sm"
                               href="bayar_tagihan.php?id_pesanan=<?php echo $p['id_pesanan']; ?>">Bayar </a>
                        <?php }
                        else
                        { ?>
                            <a class="btn btn-primary btn-sm"
                               href="bayar_tagihan.php?id_pesanan=<?php echo $p['id_pesanan']; ?>">Lihat </a>
                        <?php } ?>
                    </td>
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