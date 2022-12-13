<?php
session_start();
!isset($_SESSION['user_id']) ? require "views/login.view.php" : header("location:/admin");
