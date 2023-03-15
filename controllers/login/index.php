<?php
session_start();

!isset($_SESSION['user_id']) 
? view("/login.view.php", [
    'title' => "Login | EasyCoach Ke"
])
: header("location:/admin");
