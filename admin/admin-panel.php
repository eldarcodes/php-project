<?php
session_start();

require_once "../scripts/classes.php";

if ($_SESSION['user']['lvluser'] < 3) {
  header("Location: ../blocks/index.php");
  exit();
} else {
  $MY_USER = new Admin();


  $row = $_SESSION['user']['login'];

  if ($database->checkData('login', $_SESSION['user']['login']) == 0 || !$_SESSION['user']['login']) {
    header("Location: ../blocks/authorization.php");
    unset($_SESSION['user']);
    exit();
  } else {
    if ($_SESSION['user']['lvluser'] == "2" && $_SESSION['user']['lvluser'] === "1") {
      header("Location: ../blocks/index.php");
    }
    include "../blocks/header.php";
?>
    <section class="users">
      <div class="container">
        <div class="users-items">
          <?php $MY_USER->drawAdminPanel(); ?>
        </div>
      </div>
    </section>
<?php
  }
}
