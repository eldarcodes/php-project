<?php
session_start();
include_once "../scripts/classes.php";
$mylogin = $_SESSION['user']['login'];
$connect = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `login` = '$mylogin'");

if (mysqli_num_rows($connect) > 0) {
    header("location: profile.php");
    exit();
} else {
    include "header.php";
?>

    <section class="form-auth flex-column">
        <div class="form-auth-inner shadow p-4 bg-white rounded">
            <form action="../authorization/signup.php" method="post">
                <div class="form-group">
                    <label>Логин</label>
                    <input type="text" class="form-control" name="login">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button class="bg-primary text-center btn text-white auth-button">
                    Войти
                </button>
            </form>
            <div class="message">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <h6 class="message"> <?php echo $_SESSION['message']; ?> </h6>
                <?php unset($_SESSION['message']);
                }
                ?>
            </div>
        </div>
        <div class="registration shadow bg-white rounded text-dark">
            <p>Нет аккаунта? </p>
            <a type="submit" class="text-primary" href="../blocks/register.php"> Зарегистрироваться</a>
        </div>

    </section>


<?php
    include "footer.php";
} ?>