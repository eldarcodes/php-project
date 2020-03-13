<?php session_start();
include "header.php";
require_once "../scripts/classes.php"; ?>
<div class="container">
    <?php
    $row = $database->checkUser();
    if ($row['lvluser'] > 2) {
        echo '<a href="/blocks/addNewPost.php" class="btn btn-outline-primary btn-block mb-3" style="font-size: 23px;">+</a>';
    }
    include 'post.php';
    ?>
</div>
<?php
include "footer.php";
