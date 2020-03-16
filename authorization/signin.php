<?php
session_start();

include "../scripts/classes.php";
$defaultAvatar = "../assets/img/photo_2020-03-12_22-13-50.jpg";
$userlogin = $_POST['login'];
$userpassword = $_POST['password'];
$useremail = $_POST['email'];
$username = $_POST['name'];
$usersurname = $_POST['surname'];
$confirmpassword = $_POST['confirm_password'];
$user_register_date = date("Y-m-d");

if ($database->checkData('login', $userlogin) > 0) {
    $_SESSION['message'] = "Этот логин занят";
    $_SESSION['returnname'] = $username;
    $_SESSION['returnsurname'] = $usersurname;
    $_SESSION['returnemail'] = $useremail;
    echo $_SESSION['message'];
} else if ($database->checkData('email', $useremail) > 0) {
    $_SESSION['returnname'] = $username;
    $_SESSION['returnsurname'] = $usersurname;
    $_SESSION['returnlogin'] = $userlogin;
    $_SESSION['message'] = "Пользователь с данной почтой существует";
    echo $_SESSION['message'];
} else {
    if ($userpassword !== 0 && $userpassword === $confirmpassword && !empty($userlogin) && !empty($useremail)) {
        $userpassword = md5($userpassword);
        mysqli_query($database->connect(), "INSERT INTO `users`(`id`, `name`, `surname`, `login`, `email`, `password`, `lvluser`, `date_registration`, `city`, `gender`, `avatar`, `date_birhday`) VALUES (NULL,'$username','$usersurname','$userlogin','$useremail','$userpassword','1','$user_register_date','','','$defaultAvatar','')");
        $_SESSION['message'] = "Вы успешно зарегистрировались";
        echo $_SESSION['message'];
        echo "<script>document.location.replace('authorization.php');</script>";
        
    } else {
        $_SESSION['returnname'] = $username;
        $_SESSION['returnsurname'] = $usersurname;
        $_SESSION['message'] = "Попробуйте зарегистрироваться снова";
        echo $_SESSION['message'];
    }
}
