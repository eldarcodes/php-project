<?php
session_start();
if ($_SESSION['user']) {
    header("location: profile.php");
    exit();
}
include "header.php"; ?>
<section class="form-auth flex-column">

    <div class="form-auth-inner shadow pt-4 pl-5 pr-5 bg-white rounded">
        <h3>Регистрация</h3>
        <form action="../authorization/signin.php" method="POST">
            <div class="form-group">
                <label>Введите ваше имя</label>
                <input value="<?php if (isset($_SESSION['returnname'])) {
                                    echo $_SESSION['returnname'];
                                    unset($_SESSION['returnname']);
                                }  ?>" type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Введите вашу фамилию</label>
                <input value="<?php if (isset($_SESSION['returnsurname'])) {
                                    echo $_SESSION['returnsurname'];
                                    unset($_SESSION['returnsurname']);
                                }  ?>" type="text" class="form-control" name="surname">
            </div>
            <div class="form-group">
                <label>Введите логин</label>
                <input value="<?php if (isset($_SESSION['returnlogin'])) {
                                    echo $_SESSION['returnlogin'];
                                    unset($_SESSION['returnlogin']);
                                }  ?>" type="text" class="form-control" name="login">
            </div>
            <div class="form-group">
                <label>Введите вашу почту</label>
                <input value="<?php if (isset($_SESSION['returnemail'])) {
                                    echo $_SESSION['returnemail'];
                                    unset($_SESSION['returnemail']);
                                }  ?>" type="email" class="form-control" name="email">
                <div class="form-group">
                    <label>Введите пароль</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label>Подтвердите пароль</label>
                    <input type="password" class="form-control" name="confirm_password">

                    <button class="text-center bg-primary mt-3 btn text-white reg-button">
                        Зарегистрироваться
                    </button>
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