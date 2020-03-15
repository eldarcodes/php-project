<?php
session_start();
include_once "../scripts/classes.php";

include("header.php");
?>
<section class="form-auth flex-column">
    <div class="form-auth-inner shadow p-4 bg-white rounded">
        <form  method="post">
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

            <button id="changePassword" name='changePassword' class="bg-primary text-center btn text-white post-button">
                Подтвердить
            </button>

        </form>
        <div class="message">
                <h6 id="errormessage" <?php 
                unset($_SESSION['error']);?>class="text-center mt-3"></h6>
        </div>
    </div>

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$("#changePassword").on('click',function(e)
{
    var getoldPassword = $("#oldPassword").val();
    var newPassword = $("#newPassword").val();
    var confirmNewPassword = $("#confirmNewPassword").val();
    e.preventDefault();
    $.post("changePassword.php",
    {
        "oldPassword": getoldPassword,
        "newPassword": newPassword,
        "confirmNewPassword": confirmNewPassword,
    },function(data)
    {
        $("#errormessage").html(data);
    })
});

</script>
<?php
