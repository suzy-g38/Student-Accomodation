<?php
session_start();
$_SESSION["st_email"]=$_POST["st_email"];
header("Location: ../Student-home.php");
?>
