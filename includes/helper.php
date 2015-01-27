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