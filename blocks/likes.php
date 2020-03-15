<?php session_start();
require_once "../scripts/classes.php";
$idButton = $_POST['postId'];

$getPostInfo = mysqli_query($database->connect(), "SELECT * FROM `posts` WHERE `id` = '$idButton'");
$postInfo = mysqli_fetch_assoc($getPostInfo);

$id = $_SESSION['user']['id'];


$count = 0;
$checkLikes = mysqli_query($database->connect(), "INSERT INTO `checklikes`(`IDPOST`, `IDLIKER`, `ActiveLike`) VALUES ('$idButton','$id',1)");
$infoLikes = mysqli_query($database->connect(), "SELECT * FROM `checklikes` WHERE `IDPOST` = '$idButton' AND `IDLIKER` = '$id' ");

$information = mysqli_fetch_assoc($infoLikes);
if($information['ActiveLike'] == "1")
{
  
}


$updateLikes = mysqli_query($database->connect(), "UPDATE `posts` SET `likes` = '$postInfoLikes' WHERE `id` = '$idButton'");


$getPostInfo2 = mysqli_query($database->connect(), "SELECT * FROM `posts` WHERE `id` = '$idButton'");

$postInfo2 = mysqli_fetch_assoc($getPostInfo2);

echo $count;
