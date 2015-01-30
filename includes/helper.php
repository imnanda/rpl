<?php

function getData($data)
{
    $arrData = [];
    while ($row = mysqli_fetch_assoc($data))
    {
        $arrData[] = $row;
    }

    return $arrData;
}

function redirect($url = '../index.php')
{
    header('Location:'.$url);
    die();
}