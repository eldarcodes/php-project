<?php
session_start();
include "../scripts/classes.php";


if ($database->checkData('login', $_SESSION['user']['login']) == 0 || !$_SESSION['user']['login']) {
  header("Location: authorization.php");
  unset($_SESSION['user']['lvluser']);
  exit();
} else {
  include "header.php";
?>
  <section class="profile">
    <div class="container">
      <h1 class="profile_user"> Профиль пользователя </h1>
      <div class="card-inner">
        <div class="card w-100%">
          <div class="card-body">
            <img src="/assets/img/photo_2020-03-12_22-13-50.jpg" width="300" class="mb-3" alt="Profile">
            <h5 class="card-title"><?php echo $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname']; ?></h5>
            <p class="card-text">Ваша почта: <?php echo $_SESSION['user']['email']; ?></p>
            <p class="card-text">Ваша роль:<?php echo $_SESSION['user']['role']; ?></p>
            <p class="card-text">Дата регистрации:<?php echo $_SESSION['user']['date']; ?></p>
            <a href="#" class="btn btn-primary ">Редактировать профиль</a>
            <!-- <?php include "./editProfile.php"; ?> -->
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
}
