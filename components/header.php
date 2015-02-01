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
                <?php if (cek_jabatan("Pelayan"))
                { ?>
                    <li><a href="meja.php">Meja</a></li>
                    <li><a href="list_pesanan.php">List Pesanan</a></li>
                <?php }
                else if (cek_jabatan("Koki"))
                { ?>
                    <li><a href="list_menu.php">Menu</a></li>
                    <li><a href="list_bahan_baku.php">Bahan Baku</a></li>
                    <li><a href="list_detail_pesanan.php">Daftar Pesanan</a></li>
                <?php }
                else if (cek_jabatan("CS"))
                { ?>
                    <li><a href="list_kuesioner.php">Kuesioner</a></li>
                <?php }
                else if (cek_jabatan("Pantry"))
                { ?>
                    <li><a href="list_permintaan_pantry.php">List Permintaan Bahan Baku</a></li>
                <?php }
                else if (cek_jabatan("Kasir"))
                { ?>
                    <li><a href="list_tagihan.php">List Pesanan</a></li>
                <?php } ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>