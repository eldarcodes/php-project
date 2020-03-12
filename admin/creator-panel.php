<?php
session_start();

include "../scripts/classes.php";


$row = $_SESSION['user']['login'];

if ($database->checkData('login', $_SESSION['user']['login']) == 0 || !$_SESSION['user']['login']) {
  header("Location: ../blocks/authorization.php");
  unset($_SESSION['user']);
  exit();
} else {
  if ($_SESSION['role'] === "Менеджер" && $_SESSION['role'] === "Пользователь") {
    header("Location: ../blocks/index.php");
  }
  include "../blocks/header.php";
  require_once "../scripts/classes.php";


?>

  <section class="users">
    <div class="container">
      <div class="users-items">
        <?php
        $USER_RIGHTS->draw($database->connect());
        ?>

      </div>
    </div>
  </section>
<?php
}
