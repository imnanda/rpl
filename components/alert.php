<?php
if(isset($_SESSION['alert']))
{
    echo "<div class='alert alert-{$_SESSION['alert']['type']}'>{$_SESSION['alert']['message']}</div>";
    unset($_SESSION['alert']);
}