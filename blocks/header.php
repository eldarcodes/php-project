<?php session_start();

include "../scripts/classes.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой Веб-сайт</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>

    <?php
    if (!isset($_SESSION['user'])) {
    ?>
        <header>
            <div class="bg-white border-bottom shadow-sm p-3 px-md-4 mb-3">
                <div class="container">
                    <div class="d-flex flex-column flex-md-row align-items-center ">
                        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="./index.php" class="text-dark logo">MyWebSite</a></h5>
                        <a class="btn btn-outline-primary" href="../blocks/authorization.php">Войтиasdasdasdasdasd</a>
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
                        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="../blocks/index.php" class="text-dark logo"><?php echo $_SESSION['user']['name'] . ' ' . $_SESSION['user']['surname']; ?></a></h5>
                        <?php $USER_RIGHTS->drawPanel(); ?>
                        <a class="btn btn-outline-primary mr-3" href="../blocks/profile.php">Профиль</a>
                        <a class="btn btn-outline-primary" href="/authorization/logout.php">Выйти</a>
                    </div>
                </div>
            </div>

        </header>
    <?php
    } ?>