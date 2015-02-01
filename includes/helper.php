<?php

function getData($sql, $forceSingle = false)
{
    global $conn;

    $query = mysqli_query($conn, $sql);

    if($query)
    {
        if(mysqli_num_rows($query) < 2 && $forceSingle)
        {
            return mysqli_fetch_assoc($query);
        }

        $arrData = [];
        while ($row = mysqli_fetch_assoc($query))
        {
            $arrData[] = $row;
        }

        return $arrData;
    }
}

function redirect($url = '../index.php')
{
    header('Location:'.$url);
    die();
}

function alert($message, $type = 'info')
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}

function dd($data)
{
    var_dump($data);
    die();
}