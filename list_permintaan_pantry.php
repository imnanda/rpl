<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pantry"))
{
    header("Location:login.php");
    exit();
}

if (isset($_GET['all']))
{
    $sql = "SELECT * FROM permintaan_bahan_baku
        JOIN bahan_baku USING (id_bahan_baku)
        LEFT JOIN karyawan USING (id_karyawan)
        ORDER BY id_permintaan DESC";
}
else
{
    $sql = "SELECT * FROM permintaan_bahan_baku
        JOIN bahan_baku USING (id_bahan_baku)
        LEFT JOIN karyawan USING (id_karyawan)
        WHERE status = 'Pending'
        ORDER BY id_permintaan DESC";
}
$permintaan = getData($sql);
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
                <h1>Daftar Permintaan Bahan Baku</h1>
            </div>
            <div class="col-xs-4 text-right">
                <div class="height"></div>
            </div>
        </div>

        <div class="height"></div>
        <!-- Table -->
        <ul class="nav nav-tabs">
            <li role="presentation" class="<?php if ( ! isset($_GET['all'])) echo 'active'; ?>"><a
                    href="list_permintaan_pantry.php">Daftar Antrian Permintaan</a></li>
            <li role="presentation" class="<?php if (isset($_GET['all'])) echo 'active'; ?>"><a
                    href="list_permintaan_pantry.php?all=true">Semua Daftar Permintaan</a></li>
        </ul>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nama Bahan Baku</th>
                <th>qty</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($permintaan as $row)
            {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['nama_bahan_baku']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['status'];
                        if ($row['status'] == 'Dibeli') echo ' (' . $row['nama_karyawan'] . ')'; ?></td>
                    <td style="width:300px; text-align: right">
                        <?php if ($row['status'] == 'Pending')
                        { ?>
                            <a href="proses/beli_permintaan.php?id_permintaan=<?php echo $row['id_permintaan']; ?>"
                               class="btn
                               btn-success btn-sm">Dibeli</a>
                        <?php }?>
                    </td>
                </tr>
                <?php
                $i++;
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