<?php 
session_start();
require "../scripts/classes.php";
$editName = $_POST['name'];
$editSurname = $_POST['surname'];
$editEmail = $_POST['email'];
$editCity = $_POST['city'];
$editGender = $_POST['selected'];
$editDate = $_POST['date'];
$editAvatar = $_POST['name'];
$login =  $_SESSION['user']['login'];
$query = mysqli_query($database->connect(), "UPDATE `users` SET `name` = '$editName' , `surname` = '$editSurname'  WHERE `login` = '$login'");
$_SESSION['user']['name'] = $editName;
$_SESSION['user']['surname'] = $editSurname;


$id = $_SESSION['user']['id'];

$test = mysqli_query($database->connect(), " INSERT INTO `aboutusers` (`id`, `city`, `gender`, `avatar`) VALUES ('$id', '$editCity', '$editGender', '$editAvatar')");

$_SESSION['user']['city'] = $editCity;
$_SESSION['user']['gender'] = $editGender;
$_SESSION['user']['avatar'] = $editAvatar;

header("location: ../blocks/profile.php");
exit;
?>