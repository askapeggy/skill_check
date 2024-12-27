<?php 
include_once "db.php";
unset($_SESSION['login']);

echo "~OK~";
if($_SESSION['login'])
{
    echo "OK";
}else
{
    echo "NO";
}
to("../index.php?do=login");
?>