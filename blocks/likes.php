<?php session_start();
require_once "../scripts/classes.php";

$response = array();

$idButton = $_POST['postId'];
$id = $_SESSION['user']['id'];

$getPostInfo = mysqli_query($database->connect(), "SELECT * FROM `posts` WHERE `id` = '$idButton'");
$postInfo = mysqli_fetch_assoc($getPostInfo);

$setLikeRow = mysqli_query($database->connect(), "INSERT INTO `checklikes`(`IDPOST`, `IDLIKER`, `ActiveLike`, `likeClicked`) VALUES ('$idButton','$id', 0, 1)");

$infoLikes = mysqli_query($database->connect(), "SELECT * FROM `checklikes` WHERE `IDPOST` = '$idButton' AND `IDLIKER` = '$id'");
$informationLike = mysqli_fetch_assoc($infoLikes);

$sum = $informationLike['likeClicked'] + 1;
$likeClickedPlus =  mysqli_query($database->connect(), "UPDATE `checklikes` SET `likeClicked` = '$sum' WHERE `IDPOST` = '$idButton' AND `IDLIKER` = '$id'");

$newInfoLikes = mysqli_query($database->connect(), "SELECT * FROM `checklikes` WHERE `IDPOST` = '$idButton' AND `IDLIKER` = '$id'");
$newInformationLike = mysqli_fetch_assoc($newInfoLikes);

if ($newInformationLike['likeClicked'] % 2 == 0) {
    $likeClickedPlus =  mysqli_query($database->connect(), "UPDATE `checklikes` SET `ActiveLike` = '1' WHERE `IDPOST` = '$idButton' AND `IDLIKER` = '$id'");
    $response['img'] = 'red';
} else {
    $likeClickedPlus =  mysqli_query($database->connect(), "UPDATE `checklikes` SET `ActiveLike` = '0' WHERE `IDPOST` = '$idButton' AND `IDLIKER` = '$id'");
    $response['img'] = '';
}

$checkLikesInfo = mysqli_query($database->connect(), "SELECT * FROM `checklikes` WHERE `IDPOST` = '$idButton' AND `ActiveLike` = '1'");
$checkPostInfo = mysqli_query($database->connect(), "SELECT * FROM `posts` WHERE `id` = '$idButton'");
$checkLikesInfoArray = mysqli_num_rows($checkLikesInfo);
$checkPostInfoArray = mysqli_fetch_assoc($checkPostInfo);

$likeClickedPlus =  mysqli_query($database->connect(), "UPDATE `posts` SET `likes` = '$checkLikesInfoArray' WHERE `id` = '$idButton'");

$finalCheck = mysqli_query($database->connect(), "SELECT * FROM `posts` WHERE `id` = '$idButton'");
$finalInfo = mysqli_fetch_assoc($finalCheck);

$checkLikesArr = mysqli_fetch_assoc($checkLikesInfo);





$response['count'] = $finalInfo['likes'];


echo json_encode($response);
