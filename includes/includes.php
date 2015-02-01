<?php
error_reporting(0);

include 'session.php';
include 'db_connect.php';
include 'helper.php';

function mysql_injection(&$v, $k) {
    global $conn;
    $v = mysqli_real_escape_string($conn, htmlentities($v));
}
array_walk_recursive($_GET, 'mysql_injection');
array_walk_recursive($_POST, 'mysql_injection');
array_walk_recursive($_FILES, 'mysql_injection');
