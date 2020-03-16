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
        <form method="POST">
            <div class="form-group">
                <label>Введите ваше имя</label>
                <input style="outline:none !important" value="<?php if (isset($_SESSION['returnname'])) {
                                                                    echo $_SESSION['returnname'];
                                                                    unset($_SESSION['returnname']);
                                                                }  ?>" type="text" class="form-control error" id="name" name="name">
                <small class="alert1 form-text text-muted p-0"></small>
            </div>
            <div class="form-group">
                <label>Введите вашу фамилию</label>
                <input value="<?php if (isset($_SESSION['returnsurname'])) {
                                    echo $_SESSION['returnsurname'];
                                    unset($_SESSION['returnsurname']);
                                }  ?>" type="text" class="form-control" id="surname" name="surname">
                                <small class="alert2 form-text text-muted p-0"></small>
            </div>
            <div class="form-group">
                <label>Введите логин</label>
                <input value="<?php if (isset($_SESSION['returnlogin'])) {
                                    echo $_SESSION['returnlogin'];
                                    unset($_SESSION['returnlogin']);
                                }  ?>" type="text" class="form-control" id="login" name="login">

            </div>
            <div class="form-group">
                <label>Введите вашу почту</label>
                <input value="<?php if (isset($_SESSION['returnemail'])) {
                                    echo $_SESSION['returnemail'];
                                    unset($_SESSION['returnemail']);
                                }  ?>" type="email" class="form-control" id="email" name="email">
                <div class="form-group">
                    <label>Введите пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <small class="alert3 form-text text-muted p-0"></small>
                </div>
                <div class="form-group">
                    <label>Подтвердите пароль</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    <small class="alert4 form-text text-muted p-0"></small>
                    <button id="signin" class="text-center bg-primary mt-3 btn text-white reg-button">
                        Зарегистрироваться
                    </button>
        </form>
    </div>
    <div class="message">

        <h5 class="message" id="message_error"> <?php unset($_SESSION['message']); ?> </h5>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {



            $("#name").on("input", function() {
                var check_number = $("#name").val().search(/[0-9,!@#$%^&*№=+-<>?]/g);
                if (check_number >= 0) {
                    $('.alert1').html('Ваше имя не корректно');
                } else {
                    $('.alert1').html('');
                }
            });

            $("#surname").on("input", function() {
                var check_number = $("#surname").val().search(/[0-9,!@#$%^&*№=+-<>?]/g);
                if (check_number >= 0) {
                    $('.alert2').html('Ваша фамилия не корректно');
                } else {
                    $('.alert2').html('');
                }
            });

            $("#password").on("input", function() {
                if ($("#password").val().length < 3) {
                    $('.alert3').html('Пароль должен содержать более двух символов');
                } else {
                    $('.alert3').html('');
                }

            });

            $("#confirm_password").on("input", function() {
                if ($("#password").val() != $("#confirm_password").val()) {
                    $('.alert4').html('Пароли не совпадают');
                } else {
                    $('.alert4').html('');
                }
            });
            $('#signin').click(function(e) {
                e.preventDefault();

                var name = $('#name').val();
                var surname = $('#surname').val();
                var login = $('#login').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var confirm_password = $('#confirm_password').val();

                if (password == confirm_password) {
                    $.post("../authorization/signin.php", {
                        'name': name,
                        'surname': surname,
                        'login': login,
                        'email': email,
                        'password': password,
                        'confirm_password': confirm_password,
                    }, function(data) {
                        if (data == "Вы успешно зарегистрировались") {
                            return false;
                        }
                        $('#message_error').html(data);
                    });
                }


            });
        });
    </script>

</section>
<?php include "footer.php"; ?>