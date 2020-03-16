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
            <button id="page-one" href="pageone" class="btn btn-primary btn-block mt-2" >Сменить пароль</button>
            <button id="page-two" class="btn btn-outline-primary btn-block mt-2" >Сменить один</button>
            <button id="page-three" class="btn btn-outline-primary btn-block mt-2" >Сменить два</button>
            <button id="page-four" class="btn btn-outline-primary btn-block mt-2" >Сменить три</button>
        </div>
        <div class="col-9 p-2">
            <div id="content<?php if(!isset($_SESSION['user'])){echo "NotSession";}?>" class="shadow p-4 bg-white rounded d-block mt-2">
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

                        <button id="changePassword" name=changePassword class="bg-primary text-center btn text-white">
                            Подтвердить
                        </button>
                    </div>

                </form>
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
                        alert(data);
                    })
                });
            </script>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $("#page-one").click(function(e) {
                e.preventDefault();

               $.post("changepassword-block.php",{
               },
               function(data){
                   $("#page-one").removeClass('btn-outline-primary');
                   $("#page-one").addClass('btn-primary');
                   $("#page-two").removeClass('btn-primary');
                   $("#page-two").addClass('btn-outline-primary');
                   $("#page-three").removeClass('btn-primary');
                   $("#page-three").addClass('btn-outline-primary');
                                      $("#page-four").removeClass('btn-primary');
                   $("#page-four").addClass('btn-outline-primary');
                   $("#content").html(data);
               }
               )
            });
            $("#page-two").click(function(e) {
                e.preventDefault();

               $.post("content.php",{
               },
               function(data){
                    $("#page-two").removeClass('btn-outline-primary');
                   $("#page-two").addClass('btn-primary');
                    $("#page-one").removeClass('btn-primary');
                   $("#page-one").addClass('btn-outline-primary');
                   $("#page-three").removeClass('btn-primary');
                   $("#page-three").addClass('btn-outline-primary');
                   $("#page-four").removeClass('btn-primary');
                   $("#page-four").addClass('btn-outline-primary');
                   $("#content").html(data);
                  
               }
               )
            });
            
            $("#page-three").click(function(e) {
                e.preventDefault();

               $.post("page-three.php",{
               },
               function(data){
                $("#page-one").removeClass('btn-primary');
                   $("#page-one").addClass('btn-outline-primary');
                   $("#page-two").removeClass('btn-primary');
                   $("#page-two").addClass('btn-outline-primary');
                   $("#page-three").removeClass('btn-outline-primary');
                   $("#page-three").addClass('btn-primary');
                   $("#page-four").removeClass('btn-primary');
                   $("#page-four").addClass('btn-outline-primary');
                   $("#content").html(data);
               }
               )
            });
            $("#page-four").click(function(e) {
                e.preventDefault();

               $.post("page-four.php",{
               },
               function(data){
                    $("#page-one").removeClass('btn-primary');
                   $("#page-one").addClass('btn-outline-primary');
                   $("#page-two").removeClass('btn-primary');
                   $("#page-two").addClass('btn-outline-primary');
                   $("#page-three").removeClass('btn-primary');
                   $("#page-three").addClass('btn-outline-primary');
                   $("#page-four").removeClass('btn-outline-primary');
                   $("#page-four").addClass('btn-primary');
                   $("#content").html(data);
               }
               )
            });
    </script>
<!--  -->
<?php
