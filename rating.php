<?php

include "database.php";
session_start();
if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($con,$_GET['id']);
        $query    = "UPDATE book SET rating=rating +1 WHERE id=$id ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        header('Location:home.php');
}
if(isset($_GET['id2']))
{
    array_push($_SESSION['cart'],[$_GET['id2'],$_GET['name']]);
    header('Location:cart.php');
    //print(gettype($_SESSION['cart']));
}
else if(isset($_GET['id1']))
{
    array_push($_SESSION['cart'],[$_GET['id1'],$_GET['name']]);
    header('Location:home.php');
    //print(gettype($_SESSION['cart']));
}
?>