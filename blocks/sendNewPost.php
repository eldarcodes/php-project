<?php session_start();
include '../scripts//classes.php';

$getTitle = $_POST['title'];
$getsubTitle = $_POST['subtitle'];
$id = $_SESSION['user']['id'];

if (isset($_POST['addNewPost'])) {
    unset($_SESSION['error']);
    if (empty($getTitle) || empty($getsubTitle)) {
        $_SESSION['error'] = 'Введите текст во все поля!';
        header('location: addNewPost.php');
    } else {
        $result = mysqli_query($database->connect(), "INSERT INTO `posts`(`id`, `creator`,`title`, `subtitle`, `likes`, `image`) VALUES (0,'$id','$getTitle','$getsubTitle',0,0)");
        header('location: addNewPost.php');
        $_SESSION['error'] = 'Запись успешно создана!';
    }
}
