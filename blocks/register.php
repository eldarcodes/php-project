<?php
session_start();
if ($_SESSION['user']) {
    header("location: profile.php");
    exit();
}
include "header.php"; ?>
<section class="form-auth">
    <div class="form-auth-inner">
        <form action="../authorization/signin.php" method="POST">
            <div class="form-group">
                <label>Введите ваше имя</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Введите вашу фамилию</label>
                <input type="text" class="form-control" name="surname">
            </div>
            <div class="form-group">
                <label>Введите логин</label>
                <input type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label>Введите вашу почту</label>
                <input type="email" class="form-control" name="email">
                <div class="form-group">
                    <label>Введите пароль</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Подтвердите пароль</label>
                    <input type="password" class="form-control" name="confirm_password">
                    <button type="submit" class="btn btn-outline-primary register">Зарегистрироваться</button>
        </form>
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
</section>
<?php include "footer.php"; ?>