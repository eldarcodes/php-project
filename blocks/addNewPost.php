<?php session_start();
require_once '../scripts/classes.php';
if (!$_SESSION['user']) {
    header('location: authorization.php');
}
$row = $database->checkUser();
if ($row['lvluser'] < 3) {
    header('location: index.php');
}

include "header.php";
require_once "../scripts/classes.php";

?>
<section class="form-auth flex-column" style="height: 80vh;">
    <div style="width: 700px;" class="form-auth-inner shadow p-4 bg-white rounded">
        <form method="post">

            <div class="form-group">
                <label>Название поста</label>
                <input autocomplete="off" type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label>Текст поста</label>
                <textarea style="height: 300px; resize:none;" autocomplete="off" type="text" class="form-control" id="subtitle" name="subtitle"></textarea>
            </div>

            <button id="addNewPost" name='addNewPost' class="bg-primary text-center btn text-white btn-block">
                Подтвердить
            </button>

        </form>
        <div class="message">
            <h6 id="errormessage" class="text-center mt-3"></h6>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $("#addNewPost").on('click', function(e) {
        var title = $("#title").val();
        var subtitle = $("#subtitle").val();
        var addNewPost = $("#addNewPost").val();
        e.preventDefault();
        $.post("sendNewPost.php", {
            "title": title,
            "subtitle": subtitle,
            "addNewPost": addNewPost,
        }, function(data) {
            $("#errormessage").html(data);
        })

        $("#title").val("");
        $("#subtitle").val("");
    });
</script>
<?php



include "footer.php";
