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
                mysqli_query($database->connect(), "DELETE FROM `checklikes` WHERE `IDPOST` = '$id'");
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
                mysqli_query($database->connect(), "DELETE FROM `checklikes` WHERE `IDPOST` = '$id'");
                mysqli_query($database->connect(), "DELETE FROM `posts` WHERE `id` = '$id'");
                echo "<script>document.location.replace('index.php');</script>";
            }
        }
        ?>

        <hr class="my-4">
        <p style="height: 2em; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $res['subtitle'] ?></p>
        <div class="d-flex justify-content-between">
            <?php
            if (isset($_SESSION['user'])) : ?>
                <div class="d-flex align-items-center">
                    <button name="<?php echo $res['id'] ?>" id="like-button" class="btn p-1">

                        <svg width="30" viewBox="0 -28 512.00002 512" xmlns="http://www.w3.org/2000/svg">
                            <path id="heart" fill="<?php $id = $_SESSION['user']['id'];
                                                    $idButton = $res['id'];
                                                    $infoLikes = mysqli_query($database->connect(), "SELECT * FROM `checklikes` WHERE `IDPOST` = '$idButton' AND `IDLIKER` = '$id'");
                                                    $img = mysqli_fetch_assoc($infoLikes);


                                                    if ($img['ActiveLike'] == 1) {
                                                        echo 'red';
                                                    } else {
                                                        echo '';
                                                    }
                                                    ?>" d="m471.382812 44.578125c-26.503906-28.746094-62.871093-44.578125-102.410156-44.578125-29.554687 0-56.621094 9.34375-80.449218 27.769531-12.023438 9.300781-22.917969 20.679688-32.523438 33.960938-9.601562-13.277344-20.5-24.660157-32.527344-33.960938-23.824218-18.425781-50.890625-27.769531-80.445312-27.769531-39.539063 0-75.910156 15.832031-102.414063 44.578125-26.1875 28.410156-40.613281 67.222656-40.613281 109.292969 0 43.300781 16.136719 82.9375 50.78125 124.742187 30.992188 37.394531 75.535156 75.355469 127.117188 119.3125 17.613281 15.011719 37.578124 32.027344 58.308593 50.152344 5.476563 4.796875 12.503907 7.4375 19.792969 7.4375 7.285156 0 14.316406-2.640625 19.785156-7.429687 20.730469-18.128907 40.707032-35.152344 58.328125-50.171876 51.574219-43.949218 96.117188-81.90625 127.109375-119.304687 34.644532-41.800781 50.777344-81.4375 50.777344-124.742187 0-42.066407-14.425781-80.878907-40.617188-109.289063zm0 0" /></svg>
                    </button>

                    <span id="likes-count" class="ml-3"><?php echo $res['likes'] ?></span>
                </div>

            <?php endif;


            ?>
            <a class="btn btn-primary btn-lg" href="#" role="button">Читать дальше</a>
        </div>
    </div><?php
        }
            ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    let likeButton = document.querySelectorAll('#like-button');
    let likesCount = document.querySelectorAll('#likes-count');

    let img = document.querySelectorAll('#heart');


    for (let i = 0; i < likeButton.length; i++) {
        likeButton[i].onclick = () => {

            $.post("likes.php", {
                "postId": likeButton[i].getAttribute("name"),
            }, function(data) {
                let data2 = $.parseJSON(data)
                likesCount[i].innerText = data2.count;
                img[i].setAttribute('fill', data2.img);

            })
        }
    }
</script>