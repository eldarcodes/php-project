<?php session_start();

include_once "../scripts/classes.php";

$mylogin = $_SESSION['user']['login'];
$connect = mysqli_query($database->connect(), "SELECT * FROM `users` WHERE `login` = '$mylogin'");
$result = mysqli_fetch_assoc($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/assets/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP project</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <?php
    if (mysqli_num_rows($connect) == 0) {
        unset($_SESSION['user']);
    ?>
        <header>
            <div class="bg-white border-bottom shadow-sm p-3 px-md-4 mb-3">
                <div class="container">
                    <div class="d-flex flex-column flex-md-row align-items-center ">
                        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="./index.php" class="text-dark logo">MyWebSite</a></h5>
                        <a class="btn btn-outline-primary" href="../blocks/authorization.php">Войти</a>
                        <a type="submit" class="btn btn-primary ml-2" href="../blocks/register.php"> Зарегистрироваться</a>
                    </div>
                </div>
            </div>
        </header>
    <?php
    } else {
    ?>
        <header>
            <div class=" bg-white border-bottom shadow-sm p-3 px-md-4 mb-3">
                <div class="container ">
                    <div class="d-flex flex-column flex-md-row align-items-center ">
                        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="../blocks/index.php" class="text-dark logo"><?php echo $result['name'] . '  ' . $result['surname']; ?></a></h5>
                        <?php $USER_RIGHTS->drawPanel(); ?>
                        <a href="../blocks/profileSettings.php">
                            <img src="../assets/profile/settings.svg" width="25" class="mr-3" />
                        </a>

                        <a class="btn btn-outline-primary mr-3" href="../blocks/profile.php">Профиль</a>
                        <a class="btn btn-outline-primary" href="/authorization/logout.php">Выйти</a>
                    </div>
                </div>
            </div>
        </header>
    <?php
    } ?>