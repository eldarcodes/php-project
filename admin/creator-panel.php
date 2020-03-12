<?php
session_start();
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