<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Kasir"))
{
    header("Location:login.php");
    exit();
}

if ( ! isset($_GET['nomor_meja']) && ! isset($_GET['id_pesanan'])) redirect('meja.php');

if (isset($_GET['nomor_meja']))
{
    $nomor_meja = $_GET['nomor_meja'];

    $sql = "SELECT *
        FROM pesanan
        JOIN karyawan USING (id_karyawan)
        LEFT JOIN pembayaran USING (id_pesanan)
        WHERE nomor_meja = {$nomor_meja}
        ORDER BY id_pesanan DESC";
}
else
{
    $id_pesanan = $_GET['id_pesanan'];

    $sql = "SELECT *
        FROM pesanan
        JOIN karyawan USING (id_karyawan)
        LEFT JOIN pembayaran USING (id_pesanan)
        WHERE id_pesanan = {$id_pesanan}
        ORDER BY id_pesanan DESC";
}
$pesanan = getData($sql, true);

$sql = "SELECT *, detail_pesanan.status
        FROM detail_pesanan
        LEFT JOIN karyawan ON detail_pesanan.id_karyawan = karyawan.id_karyawan
        JOIN menu USING (id_menu)
        WHERE id_pesanan = {$pesanan['id_pesanan']}
        ";
$detail_pesanan = getData($sql);
$jumlah_detail_pesanan = count($detail_pesanan);

foreach($detail_pesanan as $dp) {
    $sub_total += $dp['harga'] * $dp['qty'];
}
$diskon = 0;
if ($sub_total > 500000) $diskon = $sub_total * 0.10;
$total_harga = $sub_total - $diskon;
$ppn = $total_harga * 0.1;
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
        <h1>Status Pesanan</h1>

        <div class="row">

            <div class="col-md-6">
                <div class="page-header">
                    <h2>Info Pesanan</h2>
                </div>
                <dl class="dl-horizontal">
                    <dt>ID Pesanan</dt>
                    <dd><?php echo $pesanan['id_pesanan']; ?></dd>
                    <dt>Meja</dt>
                    <dd><?php echo $pesanan['nomor_meja']; ?></dd>
                    <dt>Waktu Pemesanan</dt>
                    <dd><?php echo date('d-M-y H:i:s', strtotime($pesanan['waktu_pesan'])); ?></dd>
                    <dt>Nama Pelayan</dt>
                    <dd><?php echo $pesanan['nama_karyawan']; ?></dd>
                </dl>
            </div>
            <div class="col-md-6">
                <div class="page-header">
                    <h2>Info Tagihan</h2>
                </div>
                <dl class="dl-horizontal">
                    <dt>Sub Total Harga</dt>
                    <dd><?php echo 'Rp. ' . $sub_total; ?></dd>
                    <dt>PPN 10%</dt>
                    <dd><?php echo 'Rp. ' . $ppn; ?></dd>
                    <dt>Diskon</dt>
                    <dd><?php echo 'Rp. ' . $diskon; ?></dd>
                    <dt>Total Harga</dt>
                    <dd><strong><?php echo 'Rp. ' . ($total_harga + $ppn - $diskon); ?></strong></dd>
                    <?php if($pesanan['metode_pembayaran']) { ?>
                        <dt>Metode Pembayaran</dt>
                        <dd><strong><?php echo $pesanan['metode_pembayaran']; ?></strong></dd>
                    <?php } ?>
                </dl>
            </div>
        </div>

        <div class="page-header">
            <h2>Menu Pesanan</h2>
        </div>
        <div class="menu-makanan">
            <div class="row">
                <?php
                $i = 1;
                if ($jumlah_detail_pesanan % 2)
                    $end_border = $jumlah_detail_pesanan - 1;
                else
                    $end_border = $jumlah_detail_pesanan - 2;

                foreach ($detail_pesanan as $row)
                { ?>

                    <?php ?>
                    <div class="col-md-6 menu-container <?php if ($i > $end_border) echo 'bottom'; ?>"
                         id="menu-<?php echo $row['id_menu']; ?>">
                        <div class="media menu">
                            <div class="media-left">
                                <img src="http://lorempixel.com/400/200/food/<?php echo $i; ?>">
                            </div>

                            <div class="media-body menu-desc">
                                <h4 class="media-heading menu-title"><?php echo $row["nama_menu"]; ?>
                                    (x<?php echo $row['qty']; ?>)</h4>

                                <div class="menu-price">Rp. <?php echo $row["harga"] * $row['qty']; ?>
                                    (Rp. <?php echo $row["harga"]; ?>)
                                </div>
                                <div
                                    class="menu-price"><?php if ($row['status'] != "Pending") echo 'Chef ' . $row['nama_karyawan']; ?></div>
                            </div>
                            <div class="media-right menu-order">
                                <input readonly type="text" value="<?php echo $row['status']; ?>" class="status"
                                       data-id="<?php echo $row['id_menu']; ?>">
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        </div>

        <?php if(! $pesanan['id_pembayaran']) { ?>
        <hr>

        <form class="form-horizontal" action="proses/bayar.php" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Metode Pembayaran</label>

                <div class="col-sm-10">
                    <select class="form-control" name="metode_pembayaran">
                        <option value="Cash">Cash</option>
                        <option value="Kredit">Kredit</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id_pesanan"  value="<?php echo $pesanan['id_pesanan']; ?>">
                    <input type="hidden" name="total_biaya"  value="<?php echo $total_harga; ?>">
                    <input type="hidden" name="diskon"  value="<?php echo $diskon; ?>">
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </div>
            <div class="height"></div>
        </form>
        <?php } ?>
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
