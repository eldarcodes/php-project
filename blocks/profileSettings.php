<?php
session_start();
include_once "../scripts/classes.php";
 if(!isset($_SESSION['user'])) {
     header("location: authorization.php");
 }
include("header.php");
?>
<div class="container">
    <div class="d-flex">
        <div style="height: 70vh;" class="col-3 p-2">
            <a class="btn btn-outline-primary btn-block mt-2" href="">Сменить пароль</a>
            <a class="btn btn-outline-primary btn-block mt-2" href="">Lorem, ipsum dolor.</a>
            <a class="btn btn-outline-primary btn-block mt-2" href="">Lorem, ipsum dolor.</a>
            <a class="btn btn-outline-primary btn-block mt-2" href="">Lorem, ipsum dolor.</a>
        </div>
        <div class="col-9 p-2">
            <div class="shadow p-4 bg-white rounded d-block mt-2">
                <form method="post">
                    <div class="form-group">
                        <label>Введите старый пароль</label>
                        <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                    </div>
                    <div class="form-group">
                        <label>Введите новый пароль</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                    <div class="form-group">
                        <label>Подтвердите новый пароль</label>
                        <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
                    </div>

                    <div class="text-right">
                        <button id="changePassword" name='changePassword' class="bg-primary text-center btn text-white post-button">
                            Подтвердить
                        </button>
                    </div>

                </form>
                <div class="message">
                    <h6 id="errormessage" <?php
                                            unset($_SESSION['error']); ?>class="text-center mt-3"></h6>
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script>
                $("#changePassword").on('click', function(e) {
                    var getoldPassword = $("#oldPassword").val();
                    var newPassword = $("#newPassword").val();
                    var confirmNewPassword = $("#confirmNewPassword").val();
                    e.preventDefault();
                    $.post("changePassword.php", {
                        "oldPassword": getoldPassword,
                        "newPassword": newPassword,
                        "confirmNewPassword": confirmNewPassword,
                    }, function(data) {
                        $("#errormessage").html(data);
                    })
                });
            </script>
        </div>
    </div>
</div>


<!--  -->
<?php
