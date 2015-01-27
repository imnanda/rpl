<?php
session_start();

function is_login()
{
	if($_SESSION['login'] == true)
	{
		return true;
	}	
	else
	{
		return false;
	}
}

function cek_jabatan($jabatan)
{
    if(strtolower($_SESSION['jabatan']) == strtolower($jabatan))
    {
        return true;
    }
    else
    {
        return false;
    }
}