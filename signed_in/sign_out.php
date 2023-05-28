<?php
@include 'dbconfig.php';

session_start();
session_unset();
header('location:../sign_in.php');


?>

