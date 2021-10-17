<?php
include "style.php";
include "auth.php";
include "navbar.php";
include "body.php";
if(isset($_SESSION["username"])) {
    $_SESSION['books']="all";
}
?>
