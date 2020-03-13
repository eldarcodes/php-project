<?php
session_start();
include_once "../scripts/classes.php";

include("header.php");
?>
<section class="form-auth flex-column">
    <div class="form-auth-inner shadow p-4 bg-white rounded">
        <form action="changePassword.php" method="post">

            <div class="form-group">
                <label>Введите старый пароль</label>
                <input type="password" class="form-control" name="oldPassword">
            </div>
            <div class="form-group">
                <label>Введите новый пароль</label>
                <input type="password" class="form-control" name="newPassword">
            </div>
            <div class="form-group">
                <label>Подтвердите новый пароль</label>
                <input type="password" class="form-control" name="confirmNewPassword">
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
