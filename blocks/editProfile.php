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
<form action="../authorization/edit-profile.php" method="POST">
    <img src="/assets/img/photo_2020-03-12_22-13-50.jpg" width="300" class="mb-3" alt="Profile">
    <div class="card-title row d-flex align-items-center ">
        <div class="col-2 align-middle">Имя:</div>
        <input type="text" value="<?php echo $_SESSION['user']['name']; ?>" class="form-control col-3" name="name">
    </div>
    <div class="card-title row d-flex align-items-center d-flex align-items-center">
        <div class="col-2">Фамилия:</div>
        <input type="text" value="<?php echo $_SESSION['user']['surname']; ?>" class="form-control col-3" name="surname">
    </div>
    <div class="card-text mb-3 row d-flex align-items-center">
        <div class="col-2">Родной город:</div>
        <input class="form-control col-3 d-inline-block" type="text" value="<?php echo $_SESSION['user']['city'];?>" name="city"/>
    </div>
    <div class="card-text mb-3 row d-flex align-items-center">
        <div class="col-2">Пол:</div>
        <select class="custom-select col-3" name="selected">
            <option value="Мужской">Мужской</option>
            <option <?php if($_SESSION['user']['gender'] == "Женский")
            {
              echo "selected";
            }?> value="Женский">Женский</option>
        </select>
    </div>
    <div class="card-text mb-3 row d-flex align-items-center">
        <div class="col-2">Дата рождения:</div>
        <input type="date" class="form-control d-inline-block col-3" name="date">
    </div>

    <div>
        <button type="submit" class="btn btn-primary ">Сохранить</button>
        <a type="submit" href="profile.php" class="btn btn-primary ml-2">Отменить</a>
    </div>
</form>
</div>
        </div>
      </div>
    </div>
  </section><?php
  }
  ?>