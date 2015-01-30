<?php
include 'includes/includes.php';
if (!is_login() || !cek_jabatan("Koki")) {
    header("Location:login.php");
    exit();
}
$sql = "SELECT id_menu,nama_menu,harga,jenis,status FROM menu WHERE jenis = 'makanan'; ";
$result = mysqli_query($conn, $sql);
$menu = getData($result);
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

    <link href="assets/css/menu.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/ respond.min.js"></script>
    <![endif]-->
</head>
<body>
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

        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<div class="container theme-showcase" role="main">
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Daftar Menu Resoran</div>

        <!-- Table -->
        <table class="table">
            <tr>
                <b></b>
                <td>Nama Makanan</td>
                <td>Harga</td>
                <td>Status</td>
                </b>
            </tr>
            <?php
            foreach ($menu as $row) {
                ?>
                <tr>
                    <td><?php echo $row['nama_menu']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a href="editmenu.php?id_menu=<?php echo $row['id_menu']; ?>"> <button type="button" class="btn btn-blue">Edit</button></a>
                        <a href="hapus.php?id_menu=<?php echo $row['id_menu']; ?>"> <button type="button" class="btn btn-red">Hapus</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>