<?php
define('DB_HOST', 'sql202.epizy.com');
define('DB_USER', 'epiz_33766646');
define('DB_PASS', 'VdVPgo6knnpO');
define('DB_NAME', 'epiz_33766646_pdocrud');

try {
    $dbh = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}