<?php
session_start();

$title = "Login | EasyCoach Ke";

!isset($_SESSION['user_id']) ? require_once "views/login.view.php" : header("location:/admin");
