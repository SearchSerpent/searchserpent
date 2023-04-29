<?php
session_start();
require_once "dbconfig.php";

if (empty($_SESSION['userid'])) {
    header("location: admin/index.php");
    exit;
}

$sql = "SELECT * FROM tbladmin WHERE id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':id', $_SESSION['userid'], PDO::PARAM_INT);
$query->execute();
$row = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($row as $userresult);
}
