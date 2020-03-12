<?php
session_start();

include "../scripts/classes.php";

$userlogin = $_POST['login'];
$userpassword = $_POST['password'];
$useremail = $_POST['email'];
$username = $_POST['name'];
$usersurname = $_POST['surname'];
$confirmpassword = $_POST['confirm_password'];
$user_register_date = date("d.m.Y");

if ($database->checkData('login', $checklogin) > 0) {
    $_SESSION['message'] = "Этот логин занят";
    $_SESSION['returnname'] = $username;
    $_SESSION['returnsurname'] = $usersurname;
    $_SESSION['returnemail'] = $useremail;
    header("Location: ../blocks/register.php");
} else if ($database->checkData('email', $useremail) > 0) {
    $_SESSION['returnname'] = $username;
    $_SESSION['returnsurname'] = $usersurname;
    $_SESSION['returnlogin'] = $userlogin;
    $_SESSION['message'] = "Пользователь с данной почтой существует";
    header("Location: ../blocks/register.php");
} else {
    if ($userpassword !== 0 && $userpassword === $confirmpassword && !empty($userlogin) && !empty($useremail)) {
        $userpassword = md5($userpassword);
        mysqli_query($database->connect(), "INSERT INTO `users` (`id`, `name`, `surname`, `login`, `email`, `password`, `lvluser`, `date_registration`) VALUES (NULL, '$username', '$usersurname', '$userlogin', '$useremail', '$userpassword', '1' , '$user_register_date')");
        $_SESSION['message'] = "Вы успешно зарегистрировались";
        header("Location: ../blocks/authorization.php");
    } else {
        $_SESSION['returnname'] = $username;
        $_SESSION['returnsurname'] = $usersurname;
        $_SESSION['message'] = "Попробуйте зарегистрироваться снова";
        header("Location: ../blocks/register.php");
    }
}
