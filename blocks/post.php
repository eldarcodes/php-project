<?php
$row = mysqli_query($database->connect(), " SELECT * FROM `posts` ORDER BY `id` DESC");
while ($res = mysqli_fetch_assoc($row)) {
    $idd = $res['creator'];
    $connecttoUsers = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$idd' ");
    $username = mysqli_fetch_assoc($connecttoUsers);
?>
    <div class="jumbotron bg-light card">
        <h1 class="display-4"><?php echo $res['title']; ?></h1>
        <p class="lead"><?php echo $username['name']; ?></p>
        <?php
        if ($username['lvluser'] == 3) {
            echo '<form method="post"><button type="submit" name="delete-post" class="btn delete-post">
            <img src="../assets/posts/close.svg" width="25" alt="Close">
        </button></form>';

            if (isset($_POST['delete-post'])) {
                $id = $username['id'];
                mysqli_query($database->connect(), "DELETE FROM `posts` WHERE `creator` = '$id'");
                echo "<script>document.location.replace('index.php');</script>";
            }
        }
        ?>

        <hr class="my-4">
        <p><?php echo $res['subtitle'] ?></p>
        <div class="text-right">
            <a class="btn btn-primary btn-lg" href="#" role="button">Читать дальше</a>
        </div>
    </div><?php
        }
