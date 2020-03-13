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



if ($_FILES['profile-image']['name'] == '') {
    $myLogin = $_SESSION['user']['login'];
    $connect = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `login` = '$myLogin' ");
    $result = mysqli_fetch_assoc($connect);
    $path = $result['avatar'];
} else {
    $path = "../assets/img" . time() .  $_FILES['profile-image']['name'];
    move_uploaded_file($_FILES['profile-image']['tmp_name'], $path);
}

$_SESSION['user']['avatar'] = $path;


$query = mysqli_query($database->connect(), "UPDATE `users` SET `name` = '$editName' , `surname` = '$editSurname' , `avatar` = '$path' , `city` = '$editCity' , `gender` = '$editGender' , `date_birhday` = '$editDate'  WHERE `login` = '$login' ");
$_SESSION['user']['name'] = $editName;
$_SESSION['user']['surname'] = $editSurname;

header("location: ../blocks/profile.php");
exit;
