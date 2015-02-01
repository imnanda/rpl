<?php
include 'includes/includes.php';
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

<body>
    <div class="container" style="margin: 30px auto 0;">
        <div class="col-md-4 col-md-offset-4">
            <?php include "components/alert.php"; ?>
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Masuk </strong></h3></div>
                <div class="panel-body">
                    <form method="POST" action="proses/login.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Masukkan Username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-sm btn-default">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>