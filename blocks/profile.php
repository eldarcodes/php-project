<?php
session_start();
if (!$_SESSION['user']) {
  header("location: /authorization.php");
  exit();
}
include "header.php";

?>
<section class="profile">
  <div class="container">
    <h1 class="profile_user"> Профиль пользователя </h1>
    <div class="card-inner">
      <div class="card w-100%">
        <div class="card-body">
          <h5 class="card-title"><?php echo $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname']; ?></h5>
          <p class="card-text">Ваша почта: <?php echo $_SESSION['user']['email']; ?></p>
          <p class="card-text">Ваша роль:<?php echo $_SESSION['user']['role']; ?></p>

        </div>
      </div>
    </div>
  </div>

</section>