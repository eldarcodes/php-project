<?php
session_start();
if ($_SESSION['user']) {
    header("location: profile.php");
    exit();
}
include "header.php";
?>

<section class="form-auth">
    <div class="form-auth-inner">
        <form action="../authorization/signup.php" method="post">
            <div class="form-group">
                <label>Логин</label>
                <input type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-outline-primary">Авторизоваться</button>

        </form>
        <div class="registration bg-primary">
            <p>Нет аккаунта? </p>
            <a type="submit" class="" href="../blocks/register.php"> Зарегистрироваться</a>
        </div>

        <div class="message">
            <?php
            if (isset($_SESSION['message'])) {
            ?>
                <h5 class="message"> <?php echo $_SESSION['message']; ?> </h5>
            <?php unset($_SESSION['message']);
            }
            ?>
        </div>
    </div>
</section>

<?php
include "footer.php"; ?>