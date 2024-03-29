<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pelayan"))
{
    header("Location:login.php");
    exit();
}

$sql = "SELECT * FROM meja";
$meja = getData($sql);
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
        <h1>Meja</h1>
        <hr>
        <div class="row">
            <?php foreach ($meja as $row)
            { ?>
                <?php if ($row['status'] != "Tersedia") { ?>
                <a href='status_pesanan.php?nomor_meja=<?php echo $row["nomor_meja"]; ?>'>
                <?php } else { ?>
                <a href='menu.php?nomor_meja=<?php echo $row["nomor_meja"]; ?>'>
                <?php } ?>
                    <div class="col-xs-3">
                        <div class="meja <?php if ($row['status'] != "Tersedia") echo 'isi'; ?>">
                            <div class="meja-desc">
                                <div class="meja-title">Nomor Meja <?php echo $row["nomor_meja"]; ?></div>
                                <div class="meja-kursi">Jumlah Kursi <?php echo $row["jumlah_kursi"]; ?></div>
                            </div>
                        </div>
                    </div>
                </a>
                <?php } ?>
        </div>
    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
