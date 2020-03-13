<?php
$row = mysqli_query($database->connect(), " SELECT * FROM `posts` ");
while ($res = mysqli_fetch_assoc($row)) {
    $idd = $res['creator'];
    $connecttoUsers = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$idd'");
    $username = mysqli_fetch_assoc($connecttoUsers);
?>  <div class="jumbotron bg-light card">
        <h1 class="display-4"><?php echo $res['title']; ?></h1>
        <p class="lead"><?php echo $username['name']; ?></p>
        <hr class="my-4">
        <p><?php echo $res['subtitle'] ?></p>
        <div class="text-right">
            <a class="btn btn-primary btn-lg" href="#" role="button">Читать дальше</a>
        </div>
    </div><?php

        }
