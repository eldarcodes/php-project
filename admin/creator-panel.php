<?php
session_start();
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