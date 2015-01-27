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
    <form class="form-horizontal" action="kirim_menu.php" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama Menu:</label>

            <div class="col-sm-10">
                <input type="text" class="form-control"  name="nama_menu" placeholder= "Misal: Nasi Goreng">
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
                <input type="radio"  id="makanan"  name="jenis" value="makanan"> Makanan

                <input type="radio"  id="minuman"  name="jenis" value="minuman"> Minuman
            </div>
        </div>
        <div class="form-group">
            <label for="jenis" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <input type="radio"  id="makanan"  name="status" value="Tersedia"> Tersedia

                <input type="radio"  id="minuman"  name="status" value="Tidak Tersedia"> Tidak Tersedia
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" >Kirim</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>