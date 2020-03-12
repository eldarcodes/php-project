<?php

$dbhost = "localhost";
$dblogin = "root";
$dbpassword = "";
$dbname = "identification";

$connection = mysqli_connect($dbhost, $dblogin, $dbpassword, $dbname);
if (isset($connection)) {
} else {
    die("DataBase error . $connection->error");
}
