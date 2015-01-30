<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pelayan"))
{
    header("Location:login.php");
    exit();
}
$sql = "SELECT * FROM menu WHERE jenis = 'Makanan' ";
$result = mysqli_query($conn, $sql);
$makanan = getData($result);

$sql = "SELECT * FROM menu WHERE jenis = 'Minuman' ";
$result = mysqli_query($conn, $sql);
$minuman = getData($result);

$jumlah_makanan = count($makanan);
$jumlah_minuman = count($minuman);
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

    <link href="assets/css/menu.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/ respond.min.js"></script>
    <![endif]-->
</head>

<body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Bootstrap theme</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container theme-showcase" role="main">
        <h1>Daftar Menu</h1>

        <div class="menu-makanan step active">
            <div class="page-header">
                <h2>Makanan</h2>
            </div>
            <div class="row">
                <?php
                $i = 1;
                if ($jumlah_makanan % 2)
                    $end_border = $jumlah_makanan - 1;
                else
                    $end_border = $jumlah_makanan - 2;

                foreach ($makanan as $row)
                { ?>

                    <?php ?>
                    <div class="col-md-6 menu-container <?php if ($i > $end_border) echo 'bottom'; ?>"
                         id="menu-<?php echo $row['id_menu']; ?>">
                        <div class="media menu">
                            <div class="media-left">
                                <img src="http://lorempixel.com/400/200/food/<?php echo $i; ?>">
                            </div>

                            <div class="media-body menu-desc">
                                <h4 class="media-heading menu-title"><?php echo $row["nama_menu"]; ?></h4>

                                <div class="menu-price">Rp. <?php echo $row["harga"]; ?></div>
                            </div>
                            <div class="media-right menu-order">
                                <input type="number" value="0" class="qty" name="qty[<?php echo $row['id_menu']; ?>]"
                                       data-id="<?php echo $row['id_menu']; ?>">
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        </div>

        <div class="menu-minuman step sembunyi">
            <div class="page-header">
                <h2>Minuman</h2>
            </div>
            <div class="row">
                <?php
                $i = 1;
                if ($jumlah_minuman % 2)
                    $end_border = $jumlah_minuman - 1;
                else
                    $end_border = $jumlah_minuman - 2;

                foreach ($minuman as $row)
                { ?>

                    <?php ?>
                    <div class="col-md-6 menu-container <?php if ($i > $end_border) echo 'bottom'; ?>"
                         id="menu-<?php echo $row['id_menu']; ?>">
                        <div class="media menu">
                            <div class="media-left">
                                <img src="http://lorempixel.com/400/200/food/<?php echo $i; ?>">
                            </div>

                            <div class="media-body menu-desc">
                                <h4 class="media-heading menu-title"><?php echo $row["nama_menu"]; ?></h4>

                                <div class="menu-price">Rp. <?php echo $row["harga"]; ?></div>
                            </div>
                            <div class="media-right menu-order">
                                <input type="number" value="0" class="qty" name="qty[<?php echo $row['id_menu']; ?>]"
                                       data-id="<?php echo $row['id_menu']; ?>">
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        </div>

        <div class="menu-rincian step sembunyi">
            <div class="page-header">
                <h2>Rincian Pesanan</h2>
            </div>
            <div class="row">
                <?php
                $i = 1;
                if ($jumlah_minuman % 2)
                    $end_border = $jumlah_minuman - 1;
                else
                    $end_border = $jumlah_minuman - 2;

                foreach ($minuman as $row)
                { ?>

                    <?php ?>
                    <div class="col-md-6 menu-container <?php if ($i > $end_border) echo 'bottom'; ?>"
                         id="menu-<?php echo $row['id_menu']; ?>">
                        <div class="media menu">
                            <div class="media-left">
                                <img src="http://lorempixel.com/400/200/food/<?php echo $i; ?>">
                            </div>

                            <div class="media-body menu-desc">
                                <h4 class="media-heading menu-title"><?php echo $row["nama_menu"]; ?></h4>

                                <div class="menu-price">Rp. <?php echo $row["harga"]; ?></div>
                            </div>
                            <div class="media-right menu-order">
                                <input type="number" value="0" class="qty" name="qty[<?php echo $row['id_menu']; ?>]"
                                       data-id="<?php echo $row['id_menu']; ?>">
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        </div>

        <hr>

        <input class="btn btn-default btn-sebelumnya sembunyi" type="button" value="&laquo; Sebelumnya">
        <input class="btn btn-default pull-right btn-berikutnya" type="button" value="Berikutnya &raquo;">
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
            var steps = ['.menu-makanan', '.menu-minuman', '.menu-rincian'],
                i_step = 0;

            $('.btn-sebelumnya').on('click', function () {
                i_step--;

                $('.step.active').fadeTo(300, 0, function () {
                    $(this).hide().removeClass('active');
                    $(steps[i_step]).fadeTo(300, 1).addClass('active');
                });

                if(i_step == steps.length - 1) {
                    $('.btn-sebelumnya').show();
                    $('.btn-berikutnya').hide();
                }
                else if(i_step == 0)
                {
                    $('.btn-sebelumnya').hide();
                    $('.btn-berikutnya').show();
                }
                else
                {
                    $('.btn-sebelumnya').show();
                    $('.btn-berikutnya').show();
                }
            });

            $('.btn-berikutnya').on('click', function () {
                i_step++;
                $('.step.active').fadeTo(300, 0, function () {
                    $(this).hide().removeClass('active');
                    $(steps[i_step]).fadeTo(300, 1).addClass('active');
                });

                if(i_step == steps.length - 1) {
                    $('.btn-sebelumnya').show();
                    $('.btn-berikutnya').hide();
                }
                else if(i_step == 0)
                {
                    $('.btn-sebelumnya').hide();
                    $('.btn-berikutnya').show();
                }
                else
                {
                    $('.btn-sebelumnya').show();
                    $('.btn-berikutnya').show();
                }

                if(steps[i_step] == '.menu-rincian') {
                    $('.menu-rincian .row').empty();

                    var ids = [];

                    $('.qty').each(function() {
                        if($(this).val() > 0) {
                            ids.push($(this).data('id'));
                        }
                    })

                    var i = 1;
                    if (ids.length % 2)
                        var end_border = ids.length - 1;
                    else
                        var end_border = ids.length - 2;

                    for(i = 1; i <= ids.length; i++) {
                        var menu = $('#menu-' + ids[i-1]).clone().removeClass('bottom');
                        if (i > end_border)
                            menu.addClass('bottom');

                        $('.menu-rincian .row').append(menu);
                    }
                }
            });
        });
    </script>
</body>
</html>
