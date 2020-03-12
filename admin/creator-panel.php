<?php
session_start();
include "../database/db.php";
$row = $_SESSION['user']['login'];
$result = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$row'");
if(mysqli_num_rows($result) == 0 || !$_SESSION['user']['login'])
{
    header("Location: ../blocks/authorization.php");
    unset($_SESSION['user']);
    exit();
}
else{
  if($_SESSION['role'] === "Менеджер" && $_SESSION['role'] === "Пользователь")
{
  header("Location: ../blocks/index.php");
}
require "../database/db.php";
include "../blocks/header.php";
require_once "../scripts/classes.php";


?>

<section class="users">
  <div class="container">
    <div class="users-items">
      <?php
      $USER_RIGHTS->draw($connection);
      ?>

    </div>
  </div>
</section>
<?php
}