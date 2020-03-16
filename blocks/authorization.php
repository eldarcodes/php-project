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

    <section class="form-auth flex-column" style="height: 80vh;">
        <div class="form-auth-inner shadow p-4 bg-white rounded">
            <div class="form-group">
                <label>Логин</label>
                <input type="text" class="form-control" id="login" name="login">
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button id="signup" class="bg-primary text-center btn text-white auth-button">
                Войти
            </button>
            </form>
            <div class="message">
                <h6 class="messages"><?php echo $_SESSION['message'];
                                        unset($_SESSION['message']); ?></h6>
            </div>
        </div>
        <div class="registration shadow bg-white rounded text-dark">
            <p>Нет аккаунта? </p>
            <a type="submit" class="text-primary" href="../blocks/register.php"> Зарегистрироваться</a>
        </div>

    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#signup").click(function(e) {
                e.preventDefault();
                var login = $("#login").val();
                var password = $("#password").val();
                $.post("../authorization/signup.php", {
                    'login': login,
                    'password': password,

                }, function(data) {
                    if (data == "Авторизован!") {
                        window.location = "index.php";
                    } else {
                        $(".message").html(data);
                    }
                });
            });
        });
    </script>
<?php
    include "footer.php";
} ?>