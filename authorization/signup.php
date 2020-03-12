<?php
session_start();
include "../scripts/classes.php";
$login = $_POST['login'];
$password = $_POST['password'];
$password = md5($password);

$checkuser = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

if (mysqli_num_rows($checkuser) > 0) {
    $user = mysqli_fetch_assoc($checkuser);
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'surname' => $user['surname'],
        'lvluser' => $user['lvluser'],
        'login' => $user['login'],
        'date' => $user['date_registration'],
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
    if ($database->checkData('login', $login) === 0) {
        $_SESSION['message'] = "Пользователя не существует!";
        header("location: ../blocks/authorization.php");
        exit;
    }
    if ($database->checkData('password', $password) === 0) {
        $_SESSION['message'] = "Вы ввели неверный пароль!";
        header("location: ../blocks/authorization.php");
        exit;
    } else {
        $_SESSION['message'] = "Авторизация не удалась!";
        header("location: ../blocks/authorization.php");
        exit;
    }
}
