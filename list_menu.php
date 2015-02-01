<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Koki"))
{
    header("Location:login.php");
    exit();
}

switch ($_GET['jenis'])
{
    case 'Makanan' :
        $sql = "SELECT * FROM menu WHERE jenis = 'Makanan' ORDER BY id_menu DESC";
        break;

    case 'Minuman' :
        $sql = "SELECT * FROM menu WHERE jenis = 'Minuman' ORDER BY id_menu DESC";
        break;

    default :
        $sql = "SELECT * FROM menu ORDER BY id_menu DESC";
        break;
}
$menu = getData($sql);
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
                <h1>List Menu</h1>
            </div>
            <div class="col-xs-4 text-right">
                <div class="height"></div>
                <a href="tambah_menu.php" class="btn btn-success">Tambah Menu</a>
            </div>
        </div>

        <div class="height"></div>
        <!-- Table -->
        <ul class="nav nav-tabs">
            <li role="presentation" class="<?php if(! isset($_GET['jenis'])) echo 'active'; ?>"><a href="list_menu.php">Semua</a></li>
            <li role="presentation" class="<?php if($_GET['jenis'] == "Makanan") echo 'active'; ?>"><a href="?jenis=Makanan">Makanan</a></li>
            <li role="presentation" class="<?php if($_GET['jenis'] == "Minuman") echo 'active'; ?>"><a href="?jenis=Minuman">Minuman</a></li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($menu as $row)
            {
                ?>
                <tr>
                    <td><?php echo $row['nama_menu']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td style="width:140px; text-align: right">
                        <a href="editmenu.php?id_menu=<?php echo $row['id_menu']; ?>" class="btn
                               btn-success btn-sm">Edit</a>
                        <a href="hapusmenu.php?id_menu=<?php echo $row['id_menu']; ?>"
                           onclick="return confirm('Anda Ingin Menghapus')" class="btn btn-warning btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php
            }
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