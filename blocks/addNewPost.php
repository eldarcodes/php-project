<?php
include "header.php" ?>
<section class="form-auth flex-column">
    <div class="form-auth-inner shadow p-4 bg-white rounded">
        <form action="../authorization/signup.php" method="post">
            <div class="form-group">
                <label>Название поста</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Текст поста</label>
                <input type="password" class="form-control" name="subtitle">
            </div>
            <button class="bg-primary text-center btn text-white post-button">
                Подтвердить
            </button> 
            <h6 class="text-center mt-3">Запись успешно создана!</h6>
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
</section>
<?php
include "footer.php";
