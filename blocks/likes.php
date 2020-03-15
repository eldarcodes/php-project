<?php session_start();
require_once "../scripts/classes.php";
$idButton = $_POST['postId'];

$getPostInfo = mysqli_query($database->connect(), "SELECT * FROM `posts` WHERE `id` = '$idButton'");

$postInfo = mysqli_fetch_assoc($getPostInfo);

$postInfoLikes = $postInfo['likes'] + 1;

$updateLikes = mysqli_query($database->connect(), "UPDATE `posts` SET `likes` = '$postInfoLikes' WHERE `id` = '$idButton'");


$getPostInfo2 = mysqli_query($database->connect(), "SELECT * FROM `posts` WHERE `id` = '$idButton'");

$postInfo2 = mysqli_fetch_assoc($getPostInfo2);

echo $postInfo2['likes'];
