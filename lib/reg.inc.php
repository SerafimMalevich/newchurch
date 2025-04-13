<?php
session_start();
require_once "helpers.php";
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = sanitizePOST('surname');
    $name = sanitizePOST('name');
    $patronymic = sanitizePOST('patronymic');
    $telephone = sanitizePOST('telephone');
    $email = sanitizePOST('email');
    $password = sanitizePOST('password');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["ERROR"] = "Некорректный email";
    }

    if (!$surname || !$name || !$patronymic || !$telephone || !$email || !$password) {
        $_SESSION["ERROR"] = "Заполните все поля";
    }

    $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email` = :email;');
    $stmt->execute([':email' => $email]);

    if ($stmt->fetch()) {
        $_SESSION["ERROR"] = "Пользователь уже есть";
    }

    if (empty($_SESSION["ERROR"])) {
        $stmt = $pdo->prepare('INSERT INTO `users` (`surname`, `name`, `patronymic`, `telephone`, `email`, `password`) VALUES (:surname, :name, :patronymic, :telephone, :email, :password)');
        $stmt->execute([
            ':surname' => $surname,
            ':name' => $name,
            ':patronymic' => $patronymic,
            ':telephone' => $telephone,
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    redirect("../login.php");
} else {
    redirect("../login.php");
}




