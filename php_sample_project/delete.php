<?php
require 'config.php';

$pdo_statement= $pdo -> prepare("DELETE FROM post WHERE post_id=".$_GET['id']);
var_dump($pdo_statement);
$pdo_statement -> execute();
header('Location: index.php');
