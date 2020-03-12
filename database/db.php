<?php

$dbhost = "localhost";
$dblogin = "root";
$dbpassword = "";
$dbname = "stas";

$connection = mysqli_connect($dbhost, $dblogin, $dbpassword, $dbname);
if (isset($connection)) {
} else {
    die("DataBase error . $connection->error");
}
