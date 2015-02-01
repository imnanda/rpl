<?php
include 'includes/includes.php';
if ( ! is_login() || ! cek_jabatan("CS"))
{
    header("Location:login.php");
    exit();
}

$id_kuesioner = $_GET['id_kuesioner'];

$sql = "SELECT * FROM kuesioner WHERE id_kuesioner = {$id_kuesioner}";
$kuesioner = getData($sql, true);
?>
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
                <h1>Tambah Kuesioner</h1>
            </div>
            <div class="col-xs-4 text-right">
                <div class="height"></div>

            </div>
        </div>
        <hr>
        <div class="height"></div>


        <form class="form-horizontal" action="proses/ubah_kuesioner.php" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama Pelanggan</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_pengunjung" placeholder="Nama Pelanggan Mengisi Kuesioner" value="<?php echo $kuesioner['nama_pengunjung']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Isi Saran atau Kritik</label>

                <div class="col-sm-10">
                    <textarea name="saran" class="form-control" rows="10" placeholder="Saran atau Kritik"><?php echo $kuesioner['saran']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis" class="col-sm-2 control-label">Tanggal Isi</label>

                <div class="col-sm-10">
                    <input type="date" class="form-control" name="waktu_penulisan" value="<?php echo $kuesioner['waktu_penulisan']; ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id_kuesioner"  value="<?php echo $kuesioner['id_kuesioner']; ?>">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
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