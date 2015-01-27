<?php
include 'includes/includes.php';

if ( ! is_login() || ! cek_jabatan("Pelayan"))
{
    header("Location:login.php");
    exit();
}
$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
$menu = getData($result);
$jumlah_menu = count($menu);
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
        <div class="page-header">
            <h1>Menu</h1>
        </div>
        <div class="row">
            <?php
            $i = 1;
            if ($jumlah_menu % 2)
                $end_border = $jumlah_menu - 1;
            else
                $end_border = $jumlah_menu - 2;

            foreach ($menu as $row)
            { ?>

                <?php ?>
                <div class="col-md-6 menu-container <?php if ($i > $end_border) echo 'bottom'; ?>">
                    <div class="media menu">
                        <div class="media-left">
                            <img src="http://lorempixel.com/400/200/food/<?php echo $i; ?>">
                        </div>

                        <div class="media-body menu-desc">
                            <h4 class="media-heading menu-title"><?php echo $row["nama_menu"]; ?></h4>

                            <div class="menu-price">Rp. <?php echo $row["harga"]; ?></div>
                        </div>
                        <div class="media-right menu-order">
                            <input type="number" value="0" class="qty">
                        </div>
                    </div>
                </div>
                <?php $i++;
            } ?>
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
