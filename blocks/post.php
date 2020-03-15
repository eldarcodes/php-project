<?php session_start();
$row = mysqli_query($database->connect(), " SELECT * FROM `posts` ORDER BY `id` DESC");
while ($res = mysqli_fetch_assoc($row)) {
    $idd = $res['creator'];
    $connecttoUsers = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$idd' ");
    $username = mysqli_fetch_assoc($connecttoUsers);
?>
    <div class="jumbotron bg-light card">
        <h1 class="display-4"><?php echo $res['title']; ?></h1>
        <p class="lead"><?php echo $username['name'] . ' '  .   $username['surname']; ?></p>
        <p class="font-italic font-weight-light"><?php echo $res['date']; ?></p>
        <?php
        $sessionId = $_SESSION['user']['id'];
        $connecttoUsers = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `id` = '$sessionId' ");
        $username = mysqli_fetch_assoc($connecttoUsers);
        if ($username['lvluser'] == 3 && $_SESSION['user']) {
            if ($username['id'] === $res['creator']) {
                echo '<form method="post"><button type="submit" name="' . $res['id'] . '" class="btn delete-post">
            <img src="../assets/posts/close.svg" width="25" alt="Close">
        </button></form>';
            }

            if (isset($_POST[$res['id']])) {

                $id = $username['id'];
                $id2 = $res['id'];
                mysqli_query($database->connect(), "DELETE FROM `posts` WHERE `creator` = '$id' AND `id` = '$id2'");
                echo "<script>document.location.replace('index.php'); </script>";
                exit();
            }
        }
        if ($username['lvluser'] == 4 && $_SESSION['user']) {
            echo '<form method="post"><button type="submit" name="' . $res['id'] . '" class="btn delete-post">
            <img src="../assets/posts/close.svg" width="25" alt="Close">
        </button></form>';
            if (isset($_POST[$res['id']])) {
                $id = $res['id'];
                mysqli_query($database->connect(), "DELETE FROM `posts` WHERE `id` = '$id'");
                echo "<script>document.location.replace('index.php');</script>";
            }
        }
        ?>

        <hr class="my-4">
        <p><?php echo $res['subtitle'] ?></p>
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <button name="<?php echo $res['id'] ?>" id="like-button" class="btn p-1">
                    <img src="../assets/posts/heart.png" width="30" alt="">
                </button>
                <span id="likes-count" class="ml-3"><?php echo $res['likes'] ?></span>
            </div>
            <a class="btn btn-primary btn-lg" href="#" role="button">Читать дальше</a>
        </div>
    </div><?php
        }
            ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let test = document.querySelectorAll('#like-button');
    let likesCount = document.querySelectorAll('#likes-count');

    for (let i = 0; i < test.length; i++) {
        test[i].onclick = () => {

            $.post("likes.php", {
                "postId": test[i].getAttribute("name"),
            }, function(data) {
                likesCount[i].innerText = data;
            })
        }
    }
</script>