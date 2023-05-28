<?php
define('DB_HOST', 'sql105.epizy.com');
define('DB_USER', 'epiz_34189122');
define('DB_PASS', 'OGboYDIf9LXfL');
define('DB_NAME', 'epiz_34189122_pdocrud');


try {
    $conn = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
} catch (PDOException $e) {
    exit("Error" . $e->getMessage());
}