<?php
session_start();
require '../database/db.php';
include '../scripts/classes.php';
$login = $_POST['login'];
$password = $_POST['password'];
$password = md5($password);
$checkuser = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$checklogin = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$login'");
$checkpassword = mysqli_query($connection, "SELECT * FROM `users` WHERE `password` = '$password'");

if (mysqli_num_rows($checkuser) > 0) {
    $user = mysqli_fetch_assoc($checkuser);
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'surname' => $user['surname'],
        'lvluser' => $user['lvluser'],
        'role' => "",
    ];
    switch ($_SESSION['user']['lvluser']) {
        case 1:
            $_SESSION['user']['role'] = "Пользователь";
            break;
        case 2:
            $_SESSION['user']['role'] = "Менеджер";
            break;
        case 3:
            $_SESSION['user']['role'] = "Администратор";
            break;
        case 4:
            
            $_SESSION['user']['role'] = "Создатель";
            break;
    }
    header("Location: ../blocks/index.php");
    exit();
} else {
    if (mysqli_num_rows($checklogin) === 0) {
        $_SESSION['message'] = "Пользователя не существует!";
        header("location: ../blocks/authorization.php");
        exit;
    }
    if (mysqli_num_rows($checkpassword) === 0) {
        $_SESSION['message'] = "Вы ввели неверный пароль!";
        header("location: ../blocks/authorization.php");
        exit;
    } else {
        $_SESSION['message'] = "Авторизация не удалась!";
        header("location: ../blocks/authorization.php");
        exit;
    }
}
