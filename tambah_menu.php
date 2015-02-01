<?php
include 'includes/includes.php';
if ( ! is_login() || ! cek_jabatan("Koki"))
{
    header("Location:login.php");
    exit();
}
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
                <h1>Tambah Menu</h1>
            </div>
            <div class="col-xs-4 text-right">
                <div class="height"></div>

            </div>
        </div>
        <hr>
        <div class="height"></div>


        <form class="form-horizontal" action="proses/simpan_menu.php" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nama Menu:</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_menu" placeholder="Misal: Nasi Goreng">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Harga:</label>

                <div class="col-sm-10">
                    <div class="input-group">
                        <div class="input-group-addon">Rp.</div>
                        <input type="text" class="form-control" name="harga" placeholder="Hanya Angka">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis" class="col-sm-2 control-label">Jenis</label>

                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" id="makanan" name="jenis" value="makanan"> Makanan
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="minuman" name="jenis" value="minuman"> Minuman
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" id="makanan" name="status" value="Tersedia"> Tersedia
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="minuman" name="status" value="Tidak Tersedia"> Tidak Tersedia
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
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