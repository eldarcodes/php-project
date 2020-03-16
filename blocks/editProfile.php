<?php
session_start();
include "../scripts/classes.php";
if ($database->checkData('login', $_SESSION['user']['login']) == 0 || !$_SESSION['user']['login']) {
    header("Location: authorization.php");
    unset($_SESSION['user']['lvluser']);
    exit();
} else {
    include "header.php";
?>
    <section class="profile">
        <div class="container">
            <h1 class="profile_user"> Профиль пользователя </h1>
            <div class="card-inner">
                <div class="shadow p-3 mb-5 bg-white rounded w-100%">
                    <div class="card-body">
                        <form action="../authorization/edit-profile.php" method="POST" enctype="multipart/form-data">
                            <img src="<?php if (isset($result['avatar'])) {
                                            echo $result['avatar'];
                                        } else {
                                            echo '../assets/img/photo_2020-03-12_22-13-50.jpg';
                                        }  ?>" width="300" style="max-height: 600px;" class="mb-3" alt="Profile">
                            <div class="input-group mb-3">
                                <div class="custom-file col-5">
                                    <input name="profile-image" onchange="processSelectedFiles(this)" type="file" class="custom-file-input">
                                    <label class="custom-file-label" for="inputGroupFile04">Выберите файл</label>
                                </div>
                            </div>
                            <div class="card-title row d-flex align-items-center ">
                                <div class="col-2 align-middle">Имя:</div>
                                <input type="text" value="<?php echo $result['name']; ?>" class="form-control col-3" name="name">
                            </div>
                            <div class="card-title row d-flex align-items-center d-flex align-items-center">
                                <div class="col-2">Фамилия:</div>
                                <input type="text" value="<?php echo $result['surname']; ?>" class="form-control col-3" name="surname">
                            </div>
                            <div class="card-text mb-3 row d-flex align-items-center">
                                <div class="col-2">Родной город:</div>
                                <input class="form-control col-3 d-inline-block" type="text" value="<?php echo $result['city']; ?>" name="city" />
                            </div>
                            <div class="card-text mb-3 row d-flex align-items-center">
                                <div class="col-2">Пол:</div>
                                <select class="custom-select col-3" name="selected">
                                    <option value="" <?php if ($result['gender'] == "") {
                                                            echo "selected";
                                                        } ?>>Не выбрано </option>
                                    <option value="Мужской" <?php if ($result['gender'] == "Мужской") {
                                                                echo "selected";
                                                            } ?>>Мужской</option>
                                    <option value="Женский" <?php if ($result['gender'] == "Женский") {
                                                                echo "selected";
                                                            } ?>>Женский</option>
                                </select>
                            </div>
                            <div class="card-text mb-3 row d-flex align-items-center">
                                <div class="col-2">Дата рождения:</div>
                                <input type="date" class="form-control d-inline-block col-3" name="date">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary ">Сохранить</button>
                                <a type="submit" href="profile.php" class="btn btn-primary ml-2">Отменить</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function processSelectedFiles(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                document.querySelector('.custom-file-label').innerHTML = files[i].name;
            }
        }
    </script>
<?php
}
?>