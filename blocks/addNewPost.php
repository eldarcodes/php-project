<?php session_start();
require_once '../scripts/classes.php';
if (!$_SESSION['user']) {
    header('location: authorization.php');
}
$row = $database->checkUser();
if ($row['lvluser'] < 3) {
    header('location: index.php');
}

include "header.php";
require_once "../scripts/classes.php";

?>
<section class="form-auth flex-column">
    <div class="form-auth-inner shadow p-4 bg-white rounded">
        <form action="sendNewPost.php" method="post">

            <div class="form-group">
                <label>Название поста</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Текст поста</label>
                <input type="text" class="form-control" name="subtitle">
            </div>

            <button name='addNewPost' class="bg-primary text-center btn text-white post-button">
                Подтвердить
            </button>

        </form>
        <div class="message">
            <?php
            if (isset($_SESSION['error'])) {
            ?>
                <h6 class="text-center mt-3"><?php echo $_SESSION['error']; ?> </h6>

            <?php unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>
</section>
<?php



include "footer.php";
