<?php
session_start();
include "../database/db.php";
$row = $_SESSION['user']['login'];
$result = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '$row'");
if(mysqli_num_rows($result) == 0 || !$_SESSION['user']['login'])
{
    header("Location: authorization.php");
    unset($_SESSION['user']);
    exit();
}


else{
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
          <p class="card-text">Дата регистрации:<?php echo $_SESSION['user']['date']; ?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
