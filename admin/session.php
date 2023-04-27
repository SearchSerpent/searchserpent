<?php
session_start();
require_once "dbconfig.php";

if (!isset($_SESSION['userid']) || trim($_SESSION['userid']) == '') {
    header("location: admin_sign_in.php");
}
$sql = "SELECT * FROM tbladmin WHERE id='" . $_SESSION['userid'] . "'";
$query = $dbh->prepare($sql);
$query->execute();
$row = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($row as $userresult);
}
