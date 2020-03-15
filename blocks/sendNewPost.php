<?php session_start();
include '../scripts//classes.php';

$getTitle = $_POST['title'];
$getsubTitle = $_POST['subtitle'];
$id = $_SESSION['user']['id'];

if (isset($_POST['addNewPost'])) {
    unset($_SESSION['error']);
    if (empty($getTitle) || empty($getsubTitle)) {
        $_SESSION['errorpost'] = 'Введите текст во все поля!';
        echo ($_SESSION['errorpost']);
    } else {
        $today = date("Y-m-d H:i:s");
        $result = mysqli_query($database->connect(), "INSERT INTO `posts`(`id`, `creator`,`title`, `subtitle`, `likes`, `image`, `date`) VALUES (0,'$id','$getTitle','$getsubTitle',0,0, '$today')");
        $_SESSION['errorpost'] = 'Запись успешно создана!';
        echo ($_SESSION['errorpost']);
    }
}
