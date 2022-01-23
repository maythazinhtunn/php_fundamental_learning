<?php
define('MYSQL_USER', 'root');//username
define('MYSQL_PASSWORD', '');//password
define('MYSQL_HOST', 'localhost');
define('MYSQL_DATABASE', 'fwd');

$pdoOptions =array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);
//connection code
$pdo = new PDO(
    'mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
);
