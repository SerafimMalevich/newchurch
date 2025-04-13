<?php
require_once "../config.php";
try {
    $pdo = new PDO("mysql:host={$config['host']};dbname={$config['name']};", $config['user'], $config['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка " . $e->getMessage());
}