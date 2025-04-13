<?php
$dbhost = "localhost";
$dbname = "newchurch";
$dbuser = "root";
$dbpwd = "";
try {
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка " . $e->getMessage());
}