<?php
session_start();
require "../database/db.php";

$userlogin = $_POST['login'];
$userpassword = $_POST['password'];
$useremail = $_POST['email'];
$username = $_POST['name'];
$usersurname = $_POST['surname'];
$confirmpassword = $_POST['confirm_password'];


$checklogin = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$userlogin'");
$checkmail = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$useremail'");
if (mysqli_num_rows($checklogin) > 0) {
    $_SESSION['message'] = "Этот логин занят";
    header("Location: ../blocks/register.php");
} else if (mysqli_num_rows($checkmail) > 0) {
    $_SESSION['message'] = "Пользователь с данной почтой существует";
    header("Location: ../blocks/register.php");
} else {
    if ($userpassword !== 0 && $userpassword === $confirmpassword && !empty($userlogin) && !empty($useremail)) {
        $userpassword = md5($userpassword);
        mysqli_query($connection, "INSERT INTO `users` (`id`, `name`, `surname`, `login`, `email`, `password`, `lvluser`) VALUES (NULL, '$username', '$usersurname', '$userlogin', '$useremail', '$userpassword', '1')");
        $_SESSION['message'] = "Вы успешно зарегистрировались";
        header("Location: ../blocks/authorization.php");
    } else {
        $_SESSION['message'] = "Попробуйте зарегистрироваться снова";
        header("Location: ../blocks/register.php");
    }
}
