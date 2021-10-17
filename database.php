<?php
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "bookhub";
$allow=1;
$con = new mysqli($host, $user, $password,$dbname);
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>