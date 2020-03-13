<?php
session_start();
require "../scripts/classes.php";
$editName = $_POST['name'];
$editSurname = $_POST['surname'];
$editEmail = $_POST['email'];
$editCity = $_POST['city'];
$editGender = $_POST['selected'];
$editDate = $_POST['date'];
$login =  $_SESSION['user']['login'];

$path = "../assets/img" . time() .  $_FILES['profile-image']['name'];
move_uploaded_file($_FILES['profile-image']['tmp_name'], $path);

$_SESSION['user']['avatar'] = $path;

if ($_SESSION['user']['avatar'] == '') {
    $_SESSION['user']['avatar'] = '../assets/img/photo_2020-03-12_22-13-50.jpg';
}


$query = mysqli_query($database->connect(), "UPDATE `users` SET `name` = '$editName' , `surname` = '$editSurname' , `avatar` = '$path' , `city` = '$editCity' , `gender` = '$editGender' , `date_birhday` = '$editDate'  WHERE `login` = '$login' ");
$_SESSION['user']['name'] = $editName;
$_SESSION['user']['surname'] = $editSurname;

header("location: ../blocks/profile.php");
exit;
