<?php
include "database.php";
if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($con,$_GET['id']);
        $query    = "UPDATE book SET rating=rating +1 WHERE id=$id ";
        $result = mysqli_query($con, $query) or die(mysql_error());
        header('Location:home.php');
}

?>