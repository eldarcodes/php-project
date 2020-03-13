<?php
session_start();
include_once "../scripts/classes.php";
$mylogin = $_SESSION['user']['login'];
$connect = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `login` = '$mylogin'");
if (mysqli_num_rows($connect) == 0) {
  unset($_SESSION);
  header("Location: authorization.php");
  exit;
} else {
  include("header.php");
?>
  <section class="profile">
    <div class="container">
      <h1 class="profile_user"> Профиль пользователя </h1>
      <div class="card-inner">
        <div class="shadow p-3 mb-5 bg-white rounded w-100%">
          <div class="card-body">

            <?php
            $myLogin = $_SESSION['user']['login'];
            $result = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `login` = '$myLogin' ");
            $result = mysqli_fetch_assoc($result);
            switch ($result['lvluser']) {
              case 1: {
                  $result['role'] = "Пользователь";
                  break;
                }
              case 2: {
                  $result['role'] = "Менеджер";
                  break;
                }
              case 3: {
                  $result['role'] = "Администратор";
                  break;
                }
              case 4: {
                  $result['role'] = "Создатель";
                  break;
                }
            }
            ?>
            <img src="<?php
                      echo $result['avatar'];
                      ?>" width="300" style="max-height: 600px;" class="mb-3">
            <h5 class="card-title"><?php echo $result['name'] . ' ' . $result['surname'] ?></h5>
            <p class="card-text"><?php echo "Ваша почта: " . $result['email']; ?></p>
            <p class="card-text"><?php echo "Ваша роль: " . $result['role']; ?></p>
            <p class="card-text"><?php echo "Дата регистрации: " . $result['date_registration']; ?></p>
            <?php
            if ($result['gender'] != "") {
              echo '<p class="card-text">Ваш пол: ' . $result['gender'] . ' </p>';
            }
            ?>
            <?php
            if ($result['city'] != "") {
              echo '<p class="card-text">Ваш город: ' . $result['city'] . ' </p>';
            }
            ?>
            <?php
            if ($result['date_birhday'] != "") {
              echo '<p class="card-text">Дата рождения: ' . $result['date_birhday'] . ' </p>';
            }
            ?>

            <a href="editProfile.php" class="btn btn-primary ">Редактировать профиль</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
}
