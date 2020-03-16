<?php
session_start();
unset($_SESSION['message']);
unset($_SESSION['user']);
header("location: ../blocks/index.php");
