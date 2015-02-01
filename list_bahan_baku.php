<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Koki"))
{
    header("Location:login.php");
    exit();
}

$sql = "SELECT * FROM bahan_baku ORDER BY nama_bahan_baku DESC";
$bahan_baku = getData($sql);
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
                <h1>Daftar Bahan Baku</h1>
            </div>
            <div class="col-xs-4 text-right">
                <div class="height"></div>
                <a href="tambah_permintaan.php" class="btn btn-success">Buat Permintaan</a>
            </div>
        </div>

        <div class="height"></div>
        <!-- Table -->
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="list_bahan_baku.php">Daftar Bahan Baku</a></li>
            <li role="presentation"><a href="list_permintaan.php">Daftar Permintaan</a></li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama Bahan Baku</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($bahan_baku as $row)
            {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['nama_bahan_baku']; ?></td>
                    <td style="width:140px; text-align: right">
                        <a href="tambah_permintaan.php?id_bahan_baku=<?php echo $row['id_bahan_baku']; ?>" class="btn
                               btn-success btn-sm">Buat Permintaan</a>
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