<?php session_start();
require_once '../scripts/classes.php';

$getOldPassword = $_POST['oldPassword'];
$getNewPassword = $_POST['newPassword'];
$getConfirmNewPassword = $_POST['confirmNewPassword'];
$id = $_SESSION['user']['id'];

$userInfo = $database->checkUser();

$md5NewPassword = md5($getNewPassword);

if ($userInfo['password'] == md5($getOldPassword) && !empty($getNewPassword) && $getNewPassword == $getConfirmNewPassword) {
    $myLogin = $_SESSION['user']['login'];
    mysqli_query($database->connect(), "UPDATE `users` SET `password` = '$md5NewPassword' WHERE `login` = '$myLogin'");
    $_SESSION['error'] = 'Пароль успешно изменен!';
} else {
    $_SESSION['error'] = 'Что-то пошло не так';
}


header('location: profileSettings.php');
